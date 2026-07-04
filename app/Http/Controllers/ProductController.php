<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache; // Importação essencial para usar o Cache

class ProductController extends Controller
{
    public function index()
    {
        // 1. Preço Máximo - Cache por 60 minutos (3600 segundos)
        $maxPrice = Cache::remember('max_price_catalog', 3600, function () {
            $rawMaxPrice = (float) Product::max('price') ?: 99999999;
            return ceil($rawMaxPrice / 10) * 10;
        });

        // 2. Categorias - Cache por 60 minutos
        $categories = Cache::remember('active_categories', 3600, function () {
            return Category::where('is_active', true)->pluck('name');
        });

        // 3. Lista de Produtos - Cache por 30 minutos
        $products = Cache::remember('active_products_catalog', 1800, function () {
            return Product::with(['category', 'images' => function ($query) {
                $query->where('is_main', true);
            }])
                ->where('is_active', true)
                ->get()
                ->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'category' => $product->category ? $product->category->name : 'Geral',
                        'price' => $product->price,
                        'slug' => $product->slug,
                        'rating' => $product->rating ?? 5,
                        'description' => $product->description,
                        'images' => $product->images->map(function ($img) {
                            return ['path' => asset('storage/' . $img->path)];
                        })->toArray()
                    ];
                });
        });

        return view('products', compact('products', 'categories', 'maxPrice'));
    }

    public function show($slug)
    {
        // 1. Busca o produto e faz o Cache por 60 minutos usando o slug como chave única
        $product = Cache::remember('product_details_' . $slug, 3600, function () use ($slug) {
            return Product::with(['images', 'category'])
                ->where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();
        });

        // 2. Cache para as Recomendações
        $recommendedProducts = Cache::remember('product_recommendations_' . $product->id, 3600, function () use ($product) {
            $recommended = Product::with(['images' => function ($query) {
                $query->where('is_main', true);
            }])
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->where('is_active', true)
                ->inRandomOrder()
                ->take(3)
                ->get();

            if ($recommended->count() < 3) {
                $moreProducts = Product::with(['images' => function ($query) {
                    $query->where('is_main', true);
                }])
                    ->where('id', '!=', $product->id)
                    ->whereNotIn('id', $recommended->pluck('id'))
                    ->where('is_active', true)
                    ->inRandomOrder()
                    ->take(3 - $recommended->count())
                    ->get();

                $recommended = $recommended->merge($moreProducts);
            }

            return $recommended;
        });

        $features = is_string($product->features) ? json_decode($product->features, true) : $product->features;

        return view('pages.product-details', compact('product', 'recommendedProducts', 'features'));
    }

    public function storeReview(Request $request, $productId)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'comment'   => 'required|string|max:1000',
            'rating'    => 'required|integer|min:1|max:5',
        ]);

        $product = Product::findOrFail($productId);

        $product->reviews()->create([
            'user_name' => $request->user_name,
            'comment'   => $request->comment,
            'rating'    => $request->rating,
        ]);

        $product->recalculateRating();

        // DESTRÓI O CACHE ANTIGO! 
        // Isso garante que a página vai buscar no banco de dados novamente na próxima visita, 
        // mostrando a nova avaliação imediatamente.
        Cache::forget('product_details_' . $product->slug);
        
        // Se a nota mudou, é bom limpar o catálogo principal também para atualizar as estrelinhas na vitrine
        Cache::forget('active_products_catalog');

        return back()->with('success', 'Sua avaliação foi enviada com sucesso!');
    }
}
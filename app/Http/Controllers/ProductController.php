<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $rawMaxPrice = (float) Product::max('price') ?: 99999999;
        $maxPrice = ceil($rawMaxPrice / 10) * 10;

        $categories = Category::where('is_active', true)->pluck('name');

        $products = Product::with(['category', 'images' => function ($query) {
            $query->where('is_main', true);
        }])
            ->where('is_active', true)
            ->get()
            ->map(function ($product) {
                // Mapeando pro Alpine.js entender
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

        return view('products', compact('products', 'categories', 'maxPrice'));
    }

    public function show($slug)
    {
        // 1. Busca o produto com suas imagens e categoria
        $product = Product::with(['images', 'category'])
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // 2. Lógica para "Você também pode gostar"
        // Tenta buscar 3 produtos da mesma categoria, excluindo o produto atual
        $recommendedProducts = Product::with(['images' => function ($query) {
                $query->where('is_main', true); // Traz só a capa
            }])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        // Se a categoria tiver menos de 3 produtos, completa com produtos de outras categorias
        if ($recommendedProducts->count() < 3) {
            $moreProducts = Product::with(['images' => function ($query) {
                    $query->where('is_main', true);
                }])
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $recommendedProducts->pluck('id')) // Não repetir os que já pegou
                ->where('is_active', true)
                ->inRandomOrder()
                ->take(3 - $recommendedProducts->count())
                ->get();
                
            $recommendedProducts = $recommendedProducts->merge($moreProducts);
        }

        // 3. Verifica se features é uma string JSON e converte para array, caso o Model não faça o cast automático
        $features = is_string($product->features) ? json_decode($product->features, true) : $product->features;

        return view('pages.product-details', compact('product', 'recommendedProducts', 'features'));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'long_description', 
        'price', 'features', 'is_active', 'rating'
    ];

    protected $casts = [
        'features' => 'array', // Converte o JSON do banco para Array automaticamente
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    // Um produto tem várias avaliações
    public function reviews()
    {
        return $this->hasMany(Review::class)->orderBy('created_at', 'desc');
    }

    public function recalculateRating()
    {
        // O método avg() do Laravel faz a média matemática direto no banco de dados
        $average = $this->reviews()->avg('rating');

        // Atualiza a nota do produto. 
        // Usamos round() para arredondar para a estrela inteira mais próxima.
        // Se não houver comentários (null), a nota volta para 0.
        $this->update([
            'rating' => $average ? round($average) : 0
        ]);
    }
}

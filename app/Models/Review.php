<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_name',
        'comment',
        'rating',
    ];

    // Uma avaliação pertence a um único produto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

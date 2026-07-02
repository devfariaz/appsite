<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    protected $fillable = ['product_id', 'path', 'is_main'];
    
    protected function casts(): array
    {
        return [
            'is_main' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected static function booted(): void
    {
        static::deleted(function (ProductImage $productImage) {
            if ($productImage->path) {
                Storage::disk('public')->delete($productImage->path);
            }
        });
        
        static::updated(function (ProductImage $productImage) {
            if ($productImage->isDirty('path')) {
                Storage::disk('public')->delete($productImage->getOriginal('path'));
            }
        });
    }
}

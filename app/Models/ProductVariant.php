<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'variant_name',
        'variant_value',
        'price_adjustment',
        'stock_quantity',
    ];

    protected $casts = [
        'price_adjustment' => 'decimal:2',
        'stock_quantity' => 'integer',
        'created_at' => 'datetime',
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Scopes
    public function scopeColors($query)
    {
        return $query->where('variant_name', 'color');
    }

    public function scopeSizes($query)
    {
        return $query->where('variant_name', 'size');
    }
}


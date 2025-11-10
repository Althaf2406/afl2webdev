<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'image',
        'specification',
        'availability',
        'price_per_m3',
        'unit',
        'status',
    ];

    protected $casts = [
        'specification' => 'array',
        'availability' => 'boolean',
    ];

    /**
     * Event Eloquent untuk membuat slug otomatis dari name
     */
    protected static function boot()
    {
        parent::boot();

        // Saat create
        static::creating(function ($product) {
            $product->slug = strtolower(str_replace(' ', '_', $product->name));
        });

        // Saat update (jika nama berubah)
        static::updating(function ($product) {
            $product->slug = strtolower(str_replace(' ', '_', $product->name));
        });
    }

    /**
     * Format harga jadi tampilan Rupiah
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_m3, 0, ',', '.');
    }

    /**
     * Scope produk publish
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}

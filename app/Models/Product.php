<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
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

    // Accessor tambahan
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price_per_m3, 0, ',', '.');
    }

    public function isPublish($query)
    {
        return $query->where('status', 'published');
    }

    private static $product = 
        [
            'name' => 'Pasir Silika',
            'slug' => 'pasir-silika',
            'short_description' => 'Pasir silika berkualitas tinggi untuk berbagai kebutuhan industri.',
            'description' => 'Pasir silika kami diambil dari sumber terbaik dan diproses dengan standar tinggi untuk memastikan kemurnian dan kualitasnya. Cocok untuk industri kaca, konstruksi, dan lainnya.',
            'image' => 'images/products/pasir_silika.jpg',
            'specification' => [
                'Kadar Silika' => '99%',
                'Ukuran Butir' => '0.1 - 2 mm',
                'Warna' => 'Putih',
                'Kegunaan' => 'Industri Kaca, Konstruksi, dll.'
            ],
            'availability' => true,
            'price_per_m3' => 500000,
            'unit' => 'm3', 
            'status' => 'published'
        ];
}

        

    
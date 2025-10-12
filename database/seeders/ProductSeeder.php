<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Pasir Urug',
            'slug' => 'pasir-urug',
            'short_description' => 'Pasir urug serbaguna untuk berbagai aplikasi konstruksi.',
            'description' => 'Pasir urug kami cocok untuk pengurugan tanah, pembuatan jalan, dan aplikasi konstruksi lainnya. Memiliki tekstur yang baik untuk stabilitas dan drainase.',
            'image' => 'images/products/pasir_urug.jpg',
            'specification' => json_encode(["0.2 - 5 mm", "Coklat", "Pengurugan, Pembuatan Jalan, dll."]),
            'availability' => true,
            'price_per_m3' => 300000,
            'unit' => 'm3',
            'status' => 'published'
        ]);

        DB::table('products')->insert([
            'name' => 'Pasir Silika',
            'slug' => 'pasir-silika',
            'short_description' => 'Pasir silika berkualitas tinggi untuk berbagai kebutuhan industri.',
            'description' => 'Pasir silika kami diambil dari sumber terbaik dan diproses dengan standar tinggi untuk memastikan kemurnian dan kualitasnya. Cocok untuk industri kaca, konstruksi, dan lainnya.',
            'image' => 'images/products/pasir_silika.jpg',
            'specification' => json_encode(["99%", "0.1 - 2 mm", "Putih", "Industri Kaca, Konstruksi, dll."]),
            'availability' => true,
            'price_per_m3' => 500000,
            'unit' => 'm3', 
            'status' => 'published'
        ]);

        DB::table('products')->insert([
            'name' => 'Pasir Beton',
            'slug' => 'pasir-beton',
            'short_description' => 'Pasir beton berkualitas tinggi untuk konstruksi yang kuat dan tahan lama.',
            'description' => 'Pasir beton kami memiliki ukuran butir yang ideal untuk campuran beton, memberikan kekuatan dan daya tahan optimal pada struktur bangunan Anda. Cocok untuk berbagai proyek konstruksi.',
            'image' => 'images/products/pasir_beton.jpg',
            'specification' => json_encode(["0.5 - 3 mm", "Abu-abu", "Konstruksi Bangunan, Jalan, dll."]),
            'availability' => true,
            'price_per_m3' => 400000,
            'unit' => 'm3',
            'status' => 'published'
        ]);
            
    }
}

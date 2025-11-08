<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Pasir Bangunan Kasar',
                'short_description' => 'Pasir kasar untuk urugan dan pondasi',
                'description' => 'Pasir bangunan kasar untuk urugan dan pondasi. Kadar lumpur rendah, cocok untuk konstruksi.',
                'image' => 'image/pasir_kasar.jpeg',
                'specification' => 'Ukuran butir: 1-3 mm; Kadar lumpur: rendah; Cocok untuk pondasi dan urugan.',
                'availability' => 100,
                'price_per_m3' => 120000,
                'unit' => 'm3',
                'status' => 'published',
            ],
            [
                'name' => 'Pasir Pasang Halus',
                'short_description' => 'Pasir halus untuk pasangan bata dan plesteran',
                'description' => 'Pasir halus untuk pasangan bata dan plesteran, bersih dan siap pakai.',
                'image' => 'image/pasir_halus.jpg',
                'specification' => 'Ukuran butir: 0.2-1 mm; Bersih dan siap pakai untuk plesteran.',
                'availability' => 80,
                'price_per_m3' => 135000,
                'unit' => 'm3',
                'status' => 'published',

            ],
            [
                'name' => 'Pasir Silika',
                'short_description' => 'Pasir silika kualitas tinggi untuk proyek industri',
                'description' => 'Pasir silika kualitas tinggi untuk proyek industri dan konstruksi presisi.',
                'image' => 'image/pasir_silika.jpg',
                'specification' => 'Kemurnian tinggi; Butiran seragam; Ideal untuk aplikasi industri.',
                'availability' => 40,
                'price_per_m3' => 250000,
                'unit' => 'm3',
                'status' => 'published',

            ],
            [
                'name' => 'Pasir Putih Pantai',
                'short_description' => 'Pasir putih halus untuk lanskap dan finishing',
                'description' => 'Pasir putih halus, sering dipakai untuk lanskap, dekorasi, dan pekerjaan finishing.',
                'image' => 'image/pasir_putih_pantai.webp',
                'specification' => 'Warna putih bersih; Butir halus; Untuk dekorasi dan finishing.',
                'availability' => 25,
                'price_per_m3' => 300000,
                'unit' => 'm3',
                'status' => 'published',

            ],
            [
                'name' => 'Pasir Vulkanik (Hitam)',
                'short_description' => 'Pasir vulkanik gelap untuk beton khusus dan lanskap',
                'description' => 'Pasir vulkanik berwarna gelap, ideal untuk campuran beton khusus dan pengerjaan lanskap.',
                'image' => 'image/pasir_vulkanik_hitam.jpg',
                'specification' => 'Warna gelap; Sifat abrasif sedang; Cocok untuk beton khusus.',
                'availability' => 60,
                'price_per_m3' => 140000,
                'unit' => 'm3', 
                'status' => 'published',

            ],
        ];

        $now = now();

        foreach ($products as $p) {
            DB::table('products')->insert([
                'name' => $p['name'],
                'slug' => Str::slug($p['name']),
                'short_description' => $p['short_description'],
                'description' => $p['description'],
                'image' => $p['image'],
                'specification' => $p['specification'],
                'availability' => $p['availability'],
                'price_per_m3' => $p['price_per_m3'],
                'unit' => $p['unit'],
                'status' => $p['status'],
            ]);
        }
    }
}

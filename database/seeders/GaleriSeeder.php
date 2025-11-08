<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Galeri::factory(3)->create();
    }
}

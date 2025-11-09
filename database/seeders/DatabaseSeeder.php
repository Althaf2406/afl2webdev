<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(PartnerSeeder::class, 'run');
        $this->call(GaleriSeeder::class, 'run');
        $this->call(UserSeeder::class, 'run');

        Product::factory(0)->create();
    }
}

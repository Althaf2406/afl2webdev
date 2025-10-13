<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(2, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'short_description' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->randomElement([
                'image/kfc_logo.webp',
                'image/mcd_logo.png',
                'image/pertamina_logo.webp',
            ]),,
            'specification' => json_encode([
                'Ukuran Butir' => $this->faker->randomElement(['0.1 - 2 mm', '0.2 - 5 mm', '0.5 - 4 mm']),
                'Warna' => $this->faker->randomElement(['Putih', 'Coklat', 'Abu-abu']),
                'Kegunaan' => $this->faker->randomElement(['Pengurugan, Pembuatan Jalan, dll.', 'Industri Kaca, Konstruksi, dll.', 'Campuran Beton, Konstruksi, dll.'])
            ]),
            'availability' => $this->faker->boolean(80), 
            'price_per_m3' => $this->faker->numberBetween(100000, 1000000),
            'unit' => 'm3',
        ];
    }
}

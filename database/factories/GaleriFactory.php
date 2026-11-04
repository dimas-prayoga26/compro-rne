<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galeri>
 */
class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $path = ['SolarIndustri.jpg', 'Tangki.jpg'];
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'image_path' => $this->faker->randomElement($path),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

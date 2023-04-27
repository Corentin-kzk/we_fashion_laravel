<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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
        $images = Storage::allFiles('public/images'); // récupérer toutes les images
        $image = $images[array_rand($images)];
        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'image' => $image,
            'published' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'status' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'reference' => $this->faker->regexify('^#W_F\d{4}[a-zA-Z]{2}[0-9a-zA-Z]{0,6}$'),
        ];
    }
}

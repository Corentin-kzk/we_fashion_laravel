<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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

        return [
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'published' => $this->faker->boolean($chanceOfGettingTrue = 50),
            'status' => $this->faker->randomElement(['standard', 'en solde']),
            'reference' => $this->faker->regexify('[A-Za-z0-9]{16}'),
        ];
    }
}

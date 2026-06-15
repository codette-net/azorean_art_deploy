<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $title = $this->faker->randomElement([
            'João Cagarro and the Secret of Santa Bárbara',
            'Cagarro Art Print',
            'Azorean Landscape Print',
            'Original Island Artwork',
            'Pieter Adriaans Collection Piece',
        ]);

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numberBetween(100, 999)),
            'description' => $this->faker->paragraphs(3, true),
            'is_active' => true,
            'cover_image' => null,
            'base_currency' => 'EUR',
        ];
    }
}

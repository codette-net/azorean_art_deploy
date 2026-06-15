<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        $format = $this->faker->randomElement([
            'softcover',
            'hardcover',
            'print_a4',
            'print_a3',
            'original',
        ]);

        return [
            'product_id' => Product::factory(),
            'sku' => strtoupper($this->faker->unique()->bothify('AZART-###-??')),
            'stock' => $format === 'original'
                ? 1
                : $this->faker->numberBetween(5, 50),
            'title' => $this->variantTitle($format),
            'language' => $this->faker->optional()->randomElement(['en', 'pt']),
            'format' => $format,
            'weight_grams' => $this->weightForFormat($format),
            'price_cents' => $this->priceForFormat($format),
            'is_active' => true,
        ];
    }

    private function variantTitle(string $format): string
    {
        return match ($format) {
            'softcover' => $this->faker->randomElement(['English Softcover', 'Portuguese Softcover']),
            'hardcover' => 'Hardcover Edition',
            'print_a4' => 'A4 Print',
            'print_a3' => 'A3 Print',
            'original' => 'Original Artwork',
            default => 'Standard Variant',
        };
    }

    private function weightForFormat(string $format): int
    {
        return match ($format) {
            'softcover' => 350,
            'hardcover' => 650,
            'print_a4' => 120,
            'print_a3' => 220,
            'original' => 1500,
            default => 300,
        };
    }

    private function priceForFormat(string $format): int
    {
        return match ($format) {
            'softcover' => 1800,
            'hardcover' => 3000,
            'print_a4' => 2500,
            'print_a3' => 4500,
            'original' => 85000,
            default => 2000,
        };
    }
}

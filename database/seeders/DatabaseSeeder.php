<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $product = Product::factory()->create([
            'title' => 'João Cagarro and the Secret of Santa Bárbara',
            'slug' => 'joao-cagarro-and-the-secret-of-santa-barbara',
        ]);

        ProductVariant::factory()->create([
            'product_id' => $product->id,
            'title' => 'English Softcover',
            'language' => 'en',
            'format' => 'softcover',
            'sku' => 'JC-EN-SOFTCOVER',
            'price_cents' => 1800,
            'weight_grams' => 350,
            'stock' => 50,
        ]);

        ProductVariant::factory()->create([
            'product_id' => $product->id,
            'title' => 'Portuguese Softcover',
            'language' => 'pt',
            'format' => 'softcover',
            'sku' => 'JC-PT-SOFTCOVER',
            'price_cents' => 1800,
            'weight_grams' => 350,
            'stock' => 50,
        ]);

    }
}

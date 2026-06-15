<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show()
    {
        // Voor MVP hebben 1 product: de strip
        $product = Product::with('variants')
        ->where('slug', 'joao-cagarro-and-the-secret-of-santa-barbara')
        ->firstOrFail();

        return view('shop.joao-cagarro', compact('product'));
    }


}

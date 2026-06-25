<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShippingZone;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show()
    {
        $shippingZones = $this->getShippingRates();
        // Voor MVP hebben 1 product: de strip
        $product = Product::with('variants')
        ->where('slug', 'joao-cagarro-and-the-secret-of-santa-barbara')
        ->firstOrFail();

        return view('shop.joao-cagarro', compact('product', 'shippingZones'));
    }

    public function showPT() {

        $shippingZones = $this->getShippingRates();

        $product = Product::with('variants')
            ->where('slug', 'joao-cagarro-and-the-secret-of-santa-barbara')
            ->firstOrFail();

        return view('shop.joao-cagarro-pt', compact('product','shippingZones'));
    }

    public function getShippingRates() {
        return ShippingZone::query()
            ->where('is_active', true)
            ->with(['shippingRates' => fn ($query) => $query->orderBy('weight_to_grams')])
            ->get();
    }


}

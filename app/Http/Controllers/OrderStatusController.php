<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function show(Order $order)  {
        $order->load('items.productVariant','shippingZone');
        return view('shop.order-status', compact('order'));
    }

}

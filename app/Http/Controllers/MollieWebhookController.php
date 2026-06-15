<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use Illuminate\Http\Request;

class MollieWebhookController extends Controller
{
    public function __invoke(Request $request, PaymentGateway $payments)
    {
        // Mollie stuurt JSON met payment ID en status
        $payments->handleWebhook($request->all());

        return response()->json(['status' => 'ok']);
    }
}
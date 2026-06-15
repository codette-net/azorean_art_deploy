<?php

use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MollieWebhookController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/artwork/{art_id}', function ($art_id) {
    return view('artwork', ['art_id' => $art_id]);
})->name('artwork');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//Route::get('/joao-cagarro', function () {
//    return view('joao-cagarro');
//})->name('joao-cagarro');
//
//Route::get('/joao-cagarro-pt', function () {
//    return view('joao-cagarro-pt');
//})->name('joao-cagarro.pt');

Route::get('/joao-cagarro', [ShopController::class, 'show'])->name('joao-cagarro');
Route::get('/joao-cagarro-pt', [ShopController::class, 'show'])->name('joao-cagarro-pt');

// Route::get('/joao-cagarro.html', [ReservationController::class, 'showEnglish'])->name('joao-cagarro');
// Route::get('/joao-cagarro-pt.html', [ReservationController::class, 'showPortuguese'])->name('joao-cagarro-pt');
Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('reservation.store')
    ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class);

// order status
Route::get('/order-status/{order:order_number}', [OrderStatusController::class, 'show'])->name('shop.order-status');


Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout.store');
Route::get('/checkout/success/{order}', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel/{order}', [PaymentController::class, 'cancel'])->name('checkout.cancel');

Route::post('/webhooks/mollie', MollieWebhookController::class)->name('webhooks.mollie');

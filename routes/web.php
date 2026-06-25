<?php

use App\Http\Controllers\CheckoutEmailVerificationController;
use App\Http\Controllers\MailController;
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

Route::post('/contact/send', [MailController::class,'send'])->name('contact.send');
Route::post('/artwork/contact', [MailController::class,'artworkSend'])->name('artwork.send');


Route::get('/joao-cagarro', [ShopController::class, 'show'])->name('joao-cagarro');
Route::get('/joao-cagarro-pt', [ShopController::class, 'showPT'])->name('joao-cagarro-pt');

// order status
Route::get('/order-status/{order:order_number}', [OrderStatusController::class, 'show'])->name('shop.order-status');

// verify email
Route::get('/checkout/orders/{order}/verify-email', CheckoutEmailVerificationController::class)
->name('checkout.verify-email')
    ->middleware('signed');
Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout.store');
Route::get('/checkout/success/{order}', [PaymentController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel/{order}', [PaymentController::class, 'cancel'])->name('checkout.cancel');

Route::post('/webhooks/mollie', MollieWebhookController::class)->name('webhooks.mollie');

// 404

Route::fallback(function () { return view('errors.404'); });

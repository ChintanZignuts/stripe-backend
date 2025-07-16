<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeCheckoutController;
use App\Http\Controllers\StripeWebhookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/create-checkout-session', [StripeCheckoutController::class, 'createSession']);

Route::post('/webhook/stripe', [StripeWebhookController::class, 'handle']);

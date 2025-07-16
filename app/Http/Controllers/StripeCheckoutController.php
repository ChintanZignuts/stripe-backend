<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeCheckoutController extends Controller
{
    public function createSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Example: Fixed amount or dynamically from cart/order
        $lineItems = [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Cart Total',
                ],
                'unit_amount' => 5000, // $50.00 in cents
            ],
            'quantity' => 1,
        ]];

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => 'https://your-frontend.com/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'https://your-frontend.com/payment/cancel',
        ]);

        return response()->json(['url' => $session->url]);
    }
}

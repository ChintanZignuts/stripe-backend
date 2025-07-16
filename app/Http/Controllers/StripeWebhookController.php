<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
use Stripe\Stripe;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $secret);
        } catch (\Exception $e) {
            Log::error("Webhook error: " . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        // Handle completed checkout
        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            Log::info("✅ Payment completed for session: " . $session->id);

            // TODO: Update your order/payment model here
        }

        return response()->json(['status' => 'success']);
    }
}

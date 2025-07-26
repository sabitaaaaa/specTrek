<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{

public function stripe()
{
    if (!auth()->check()) {
        dd('NOT LOGGED IN');
    }

    return view('stripe');
}

    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => 69, // 99rs
                    'product_data' => [
                        'name' => 'Spectrek Premium',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($session->url);
    }
    public function paymentSuccess()
    {
        auth()->user()->update(['is_premium' => true]);
        return view('premium-content');
    }

    public function paymentCancel()
    {
        return back()->with('error', 'Payment was cancelled.');
    }
}

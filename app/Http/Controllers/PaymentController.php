<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function charge(Request $request)
    {
        // Set your Stripe API key.
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Get the payment amount and email address from the form.
        $amount = $request->input('amount') * 100;
        $email = $request->input('email');

        // Create a new Stripe customer.
        $customer = Customer::create([
            'email' => $email,
            'source' => $request->input('stripeToken'),
        ]);

        // Create a new Stripe charge.
        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => $amount,
            'currency' => 'usd',
        ]);

        // Return a success message
        return response()->json(['message' => 'Payment successful!']);
    }
}

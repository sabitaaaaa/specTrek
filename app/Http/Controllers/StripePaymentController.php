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

        ('NOT LOGGED IN');
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
    // In StripePaymentController.php
    public function paymentSuccess(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/login');
        }

        // Get trek slug from session, route param, or request
        $slug = $request->input('slug', session('trek_slug', '')); // fallback to '' if nothing found

        // Update the user as premium
        $user->is_premium = true;
        $user->save();

        // Optional: forget stored slug after use
        session()->forget('trek_slug');

        //  Redirect back to the trek page with success message
        return redirect()->to('/' . $slug)->with('success', 'Premium unlocked!');
    }



    public function paymentCancel()
    {
        return back()->with('error', 'Payment was cancelled.');
    }
}

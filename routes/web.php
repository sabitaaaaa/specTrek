<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EsewaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/AmaYangriTrek', function () {
    return view('AmaYangriTrek');
});

Route::get('/AmaYangriPaid', function () {
    return view('AmaYangriPaid');
});

Route::get('/LangtangTrek', function () {
    return view('LangtangTrek');
});

Route::get('/ShivapuriTrek', function () {
    return view('ShivapuriTrek');
});

Route::get('/see-more', function () {
    return view('see_more');
})->name('see_more');

Route::get('/esewa-pay', [EsewaController::class, 'pay'])->name('esewa.pay');
Route::get('/esewa-success', [EsewaController::class, 'success']);
Route::get('/esewa-failure', [EsewaController::class, 'failure']);


Route::get('/charge', function () {
    return view('charge');
});

Route::post('/charge', function (Request $request) {
    // Set your Stripe API key.
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Get the payment amount and email address from the form.
    $amount = $request->input('amount') * 100;
    $email = $request->input('email');

    // Create a new Stripe customer.
    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source' => $request->input('stripeToken'),
    ]);

    // Create a new Stripe charge.
    $charge = \Stripe\Charge::create([
        'customer' => $customer->id,
        'amount' => $amount,
        'currency' => 'usd',
    ]);

    // Display a success message to the user.
    return 'Payment successful!';
});

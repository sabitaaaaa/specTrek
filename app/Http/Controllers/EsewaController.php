<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumPayment;

class EsewaController extends Controller
{
    public function pay()
    {
        return view('pay'); // This will load resources/views/pay.blade.php
    }

    public function success(Request $request)
    {
        $amount = $request->input('amt');
        $pid = $request->input('pid');

        PremiumPayment::create([
            'transaction_id' => $pid,
            'amount' => $amount,
            'status' => 'success',
        ]);

        return redirect('/see-more')->with('message', 'Payment successful! Enjoy premium content.');
    }

    public function failure()
    {
        return redirect('/see-more')->with('message', 'Payment failed.');
    }
}

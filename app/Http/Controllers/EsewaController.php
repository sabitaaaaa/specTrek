<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumPayment;

class EsewaController extends Controller
{
    public function success(Request $request)
    {
        // Here you handle the payment success logic.
        $amount = $request->input('amt');
        $pid = $request->input('pid');

        // Save payment record
        PremiumPayment::create([
            'transaction_id' => $pid,
            'amount' => $amount,
            'status' => 'success',
        ]);

        // Redirect to see-more page with a success message
        return redirect('/see-more')->with('message', 'Payment successful! Enjoy premium content.');
    }
}

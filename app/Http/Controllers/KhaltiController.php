<?php

namespace App\Http\Controllers;


use Neputer\Facades\Khalti;
use Illuminate\Support\Facades\Redirect;

class KhaltiController extends Controller {
    public function pay() {
        $return_url = "http://example.com/verify";
        $purchase_order_id = "your_transaction_id";
        $purchase_order_name = "your_order_name";
        $amount = 1000;

        $response =  Khalti::initiate($return_url, $purchase_order_id, $purchase_order_name,  $amount);

        return Redirect::to($response->payment_url);
    }

    public function verify(Request $request) {
        $pidx = $request->get('pidx');
        return Khalti::lookup($pidx);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceRange;
use App\Models\Trek;

class PriceRangeController extends Controller
{
    public function filterByPrice(Request $request)
    {
        $price = $request->price;

        $matchingRange = PriceRange::where('min_price', '<=', $price)
                                   ->where('max_price', '>=', $price)
                                   ->first();

        if (!$matchingRange) {
            return response()->json([]); // no treks found for this price
        }

        $treks = Trek::whereBetween('price', [$matchingRange->min_price, $matchingRange->max_price])->get();

        return response()->json($treks);
    }
}



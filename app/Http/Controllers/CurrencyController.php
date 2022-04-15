<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function getCurrencies(Request $request, $valuteId) {
        $currencies = Currency::orderBy('date', 'desc')
            ->where([
                ['valute_id', '=', $valuteId],
                ['date', '>=', $request->query('from')],
                ['date', '<=', $request->query('to')],
            ])
            ->get();

        return response()->json([
            'data' => $currencies,
        ], 200);
    }
}

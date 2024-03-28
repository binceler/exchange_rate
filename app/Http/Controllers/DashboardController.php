<?php

namespace App\Http\Controllers;

use App\Models\ExchangeRateLists;

class DashboardController extends Controller
{
    public function index()
    {
        $results = ExchangeRateLists::select('*')
            ->whereIn(\DB::raw('(symbol, amount)'), function($query) {
                $query->select(\DB::raw('symbol, MIN(amount)'))
                    ->from('exchange_rate_lists')
                    ->groupBy('symbol');
            })
            ->orderByRaw("CASE WHEN symbol = '$' THEN 1 WHEN symbol = '€' THEN 2 WHEN symbol = '£' THEN 3 ELSE 4 END")
            ->get();

        return view('dashboard')->with('results', $results);
    }


}

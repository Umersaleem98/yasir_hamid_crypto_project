<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CoinGeckoService;

class CoinController extends Controller
{
    protected $coinGeckoService;

    public function __construct(CoinGeckoService $coinGeckoService)
    {
        $this->coinGeckoService = $coinGeckoService;
    }

    public function getLivePrices()
    {
        $livePrices = $this->coinGeckoService->getLivePrices();
        return response()->json($livePrices);
    }

    public function getTrendingCoins()
    {
        $trendingCoins = $this->coinGeckoService->getTrendingCoins();
        return response()->json($trendingCoins);
    }

    public function crypto_table()
    {
        return view('template.crypto_tables');
    }
}

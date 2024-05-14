<?php

namespace App\Http\Controllers;

use App\Models\CoinDetails;
use App\Models\CoinsList;
use DateTime;
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
    public function currencyFilter(Request $request)
    {
        $search = $request->query('search');
        $livePrices = CoinsList::where('name', 'like', '%' . $search . '%')->get();
        return response()->json($livePrices);
    }

    public function getTrendingCoins()
    {
        $trendingCoins = $this->coinGeckoService->getTrendingCoins();
        return response()->json($trendingCoins);
    }
    public function getCoinsDetails(Request $request)
    {
        $trendingCoins = $this->coinGeckoService->getCoinsDetails($request->currency,$request->id);
        return response()->json($trendingCoins);
    }

    public function coinsList()
    {
        set_time_limit(0);

        $coinsList = $this->coinGeckoService->getCoinsList();
        foreach ($coinsList as $coin) {
            CoinsList::updateOrCreate(
                ['coin_id' => $coin['id']],
                [
                    'name' => $coin['name'],
                    'symbol' => $coin['symbol'],
                ]);
        }
        return response()->noContent();
    }
    public function crypto_table(Request $request)
    {
        $search = $request->input('search-term');
        if($search)
        {
            $coin = CoinsList::select('coin_id')->where('name', 'like', '%' . $search . '%')->first();
            if($coin->coin_id) {
                $CoinDetails = $this->coinGeckoService->getCoinsDetails('USD', $coin->coin_id);
                foreach ($CoinDetails as $CoinDetail) {
                    CoinDetails::updateOrCreate(
                        ['coin_id' => $CoinDetail['id']],
                        [
                            'name' => $CoinDetail['name'],
                            'symbol' => $CoinDetail['symbol'],
                            'image' => $CoinDetail['image'],
                            'current_price' => $CoinDetail['current_price'],
                            'market_cap' => $CoinDetail['market_cap'],
                            'market_cap_rank' => $CoinDetail['market_cap_rank'],
                            'fully_diluted_valuation' => $CoinDetail['fully_diluted_valuation'],
                            'total_volume' => rtrim(sprintf('%.10f', $CoinDetail['high_24h']), '0'),
                            'high_24h' => rtrim(sprintf('%.10f', $CoinDetail['high_24h']), '0'),
                            'low_24h' => rtrim(sprintf('%.10f', $CoinDetail['low_24h']), '0'),
                            'price_change_24h' => $CoinDetail['price_change_24h'],
                            'price_change_percentage_24h' => $CoinDetail['price_change_percentage_24h'],
                            'market_cap_change_24h' => $CoinDetail['market_cap_change_24h'],
                            'market_cap_change_percentage_24h' => $CoinDetail['market_cap_change_percentage_24h'],
                            'circulating_supply' => $CoinDetail['circulating_supply'],
//                            'total_supply' => $CoinDetail['total_supply'],
//                            'max_supply' => $CoinDetail['max_supply'],
                            'ath' => $CoinDetail['ath'],
                            'ath_change_percentage' => $CoinDetail['ath_change_percentage'],
                            'ath_date' => $CoinDetail['ath_date'],
                            'atl' => $CoinDetail['atl'],
                            'atl_change_percentage' => $CoinDetail['atl_change_percentage'],
                            'atl_date' =>$CoinDetail['atl_date'],
                            'roi' => $CoinDetail['roi'],
                        ]
                    );
                }
                return view('template.crypto_tables', ['coinDetails' => $CoinDetails]);
            }
            return view('template.crypto_tables');

        }
        return view('template.crypto_tables');
    }
}

<?php

namespace App\Services;

use GuzzleHttp\Client;

class CoinGeckoService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.coingecko.com/api/v3/',
        ]);
    }

    public function getLivePrices()
    {
        $response = $this->client->get('simple/price?ids=bitcoin&vs_currencies=usd');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getTrendingCoins()
    {
        $response = $this->client->get('search/trending');
        return json_decode($response->getBody()->getContents(), true);
    }
}

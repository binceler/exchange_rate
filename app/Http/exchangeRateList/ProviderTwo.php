<?php

namespace App\Http\exchangeRateList;

use Illuminate\Support\Facades\Http;

class ProviderTwo extends BaseProviderAbstract
{
    public $apiUrl = 'https://mocki.io/v1/6242a1b1-99a1-4237-8b39-17784726e56f';
    public $listId = 2;
    public $response;

    public function __construct()
    {
        $this->response = Http::get($this->apiUrl);
    }

    public function getList()
    {
        $jsonArrayList = $this->response->json();

        $dataArray = $jsonArrayList['data'];

        foreach ($dataArray as $jsonArray) {
            $symbol = $jsonArray['symbol'];
            $currencyName = $jsonArray['currencyName'];
            $amount = $jsonArray['amount'];
            $shrtCode = $jsonArray['shrtCode'];

            $this->saveData($this->listId, $symbol, $currencyName, $amount, $shrtCode);
        }

        return true;
    }
}

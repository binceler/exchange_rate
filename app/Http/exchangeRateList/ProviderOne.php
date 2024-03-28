<?php

namespace App\Http\exchangeRateList;

use Illuminate\Support\Facades\Http;

class ProviderOne extends BaseProviderAbstract
{
    public $apiUrl = 'https://mocki.io/v1/d48ae62a-d91f-48fe-963e-020532970dff';
    public $listId = 1;
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
            $currencyName = $jsonArray['name'];
            $amount = $jsonArray['price'];
            $shrtCode = $jsonArray['shortCode'];

            $this->saveData($this->listId, $symbol, $currencyName, $amount, $shrtCode);
        }

        return true;
    }
}

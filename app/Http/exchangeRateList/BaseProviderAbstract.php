<?php

namespace App\Http\exchangeRateList;

use App\Models\ExchangeRateLists;

abstract class BaseProviderAbstract
{
    abstract function getList();


    public function saveData($listId, $symbol, $currencyName, $amount, $shrtCode)
    {
        $exchangeRateList = ExchangeRateLists::updateOrCreate(
            [
                'symbol' => $symbol,
                'currencyName' => $currencyName,
                'amount' => $amount,
                'shrtCode' => $shrtCode
            ]
        );

        return $exchangeRateList;
    }
}

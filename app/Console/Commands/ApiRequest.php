<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class ApiRequest 
{
  public static function getCurrenciesByDate($date) 
  {
    $currenciesResult = [];
    $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $date->format('d/m/Y');
    $currencies = simplexml_load_string(Http::get($url)->body());

    foreach ($currencies as $currency) 
    {
        array_push($currenciesResult, [
            'valute_id' => ApiRequest::getId($currency),
            'num_code' => $currency->NumCode,
            'char_code' => $currency->CharCode,
            'name' => $currency->Name,
            'value' => $currency->Value,
            'date' => $date,
        ]);
    }

    return $currenciesResult;
  }

  private static function getId($xml) 
  {
    $id = null;
    
    foreach ($xml->attributes() as $key => $value) 
    {
        $id = $value;
    }

    return $id;
  }
}
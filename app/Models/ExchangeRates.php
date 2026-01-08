<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ExchangeRates extends Model
{

    const CURRENCY_EUR="eur";
    const CURRENCY_USD="usd";
    const CURRENCY_RUB="rub";

    const AVAILABLE_CURRENCIES=[
        self::CURRENCY_EUR,self::CURRENCY_RUB,self::CURRENCY_USD

    ];



    protected $table="exchange_rates";
    protected $fillable=['currency','value'];

    public static  function getCurrencyForToday($currency)
    {
         return self::where('currency',$currency)
             ->whereDate('created_at',Carbon::now())
             ->first();
    }
}

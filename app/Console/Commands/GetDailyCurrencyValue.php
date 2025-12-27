<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;

class GetDailyCurrencyValue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:get-values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get todays currency value for USD and EUR';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response=Http::get("https://kurs.resenje.org/api/v1/currencies/eur/rates/today");
        dd($response->json()["exchange_middle"]);
    }
}

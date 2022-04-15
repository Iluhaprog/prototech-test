<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Currency;
use DateTime;

class DailyCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get daily data about currencies using this api http://www.cbr.ru/development/SXML/';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = new DateTime();
        $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $currentDate->format('d/m/Y');
        $currencies = simplexml_load_string(Http::get($url)->body());

        foreach ($currencies as $currency) 
        {
            Currency::create([
                'valute_id' => $this->getId($currency),
                'num_code' => $currency->NumCode,
                'char_code' => $currency->CharCode,
                'name' => $currency->Name,
                'value' => $currency->Value,
                'date' => new DateTime(),
            ]);
        }
        
        $this->info('Success!');
    }

    private function getId($xml) {
        $id = null;
        
        foreach ($xml->attributes() as $key => $value) {
            $id = $value;
        }

        return $id;
    }
}

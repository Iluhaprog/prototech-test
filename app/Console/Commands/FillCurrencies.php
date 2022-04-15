<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Currency;
use DateTime;

class FillCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currencies = Currency::orderBy('date', 'desc')
            ->offset(1)
            ->limit(30)
            ->get();
        
        if (count($currencies) === 0) 
        {
            $dates = $this->genDates();
            foreach ($dates as $date) 
            {
                $this->info('Date ' . $date->format('d/m/Y'));
                $currencies = ApiRequest::getCurrenciesByDate($date);
                foreach ($currencies as $currency) 
                {
                    Currency::create($currency);
                }
            };
        }

        $this->info('Success filling!');
    }

    private function genDates() 
    {
        $dates = [];

        for ($day = 1; $day < 30; $day++) 
        {
            $date = new DateTime('-' . $day . ' days');
            array_push($dates, $date);
        }

        return $dates;
    }
}

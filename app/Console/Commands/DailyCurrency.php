<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
        $currencies = ApiRequest::getCurrenciesByDate($currentDate);

        foreach ($currencies as $currency) 
        {
            Currency::create($currency);
        }
        
        $this->info('Success!');
    }
}

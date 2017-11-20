<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Rate;

class ParseRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse rates of Bitcoin cryptocurreny';

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
     */
    public function handle()
    {
        $start = microtime(true);
        $data  = Rate::parse();
        Rate::store($data);
        \Log::info(null,  [
            'provider'     => env('CURRENCY_PROVIDER'),
            'time_execute' => microtime(true) - $start
        ]);
    }
}

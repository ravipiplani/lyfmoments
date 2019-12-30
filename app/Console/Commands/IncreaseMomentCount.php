<?php

namespace App\Console\Commands;

use App\Config;
use Illuminate\Console\Command;

class IncreaseMomentCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lyf:increase-moment-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increases the moment count.';

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
     * @return mixed
     */
    public function handle()
    {
        $new_count = Config::get_value('moments_count') + rand(0, 100);
        Config::update_value('moments_count', $new_count);
    }
}

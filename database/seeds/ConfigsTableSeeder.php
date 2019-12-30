<?php

use App\Config;
use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = Config::firstOrNew(['key' => 'moments_count']);
        $config->fill([
            'value' => 32423
        ])->save();
    }
}

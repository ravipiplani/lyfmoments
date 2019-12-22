<?php

use App\Feel;
use Illuminate\Database\Seeder;

class FeelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feel = Feel::firstOrNew(['name' => 'Happy']);
        $feel->fill([
            'icon' => 'fa-smile'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Loved']);
        $feel->fill([
            'icon' => 'fa-heart'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Flirty']);
        $feel->fill([
            'icon' => 'fa-kiss-wink-heart'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Angry']);
        $feel->fill([
            'icon' => 'fa-angry'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Sad']);
        $feel->fill([
            'icon' => 'fa-frown'
        ])->save();
    }
}

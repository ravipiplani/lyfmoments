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
            'icon' => 'fa-smile',
            'color' => '#FFEB3B'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Loved']);
        $feel->fill([
            'icon' => 'fa-heart',
            'color' => '#F44336'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Flirty']);
        $feel->fill([
            'icon' => 'fa-kiss-wink-heart',
            'color' => '#E91E63'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Angry']);
        $feel->fill([
            'icon' => 'fa-angry',
            'color' => '#FF5722'
        ])->save();

        $feel = Feel::firstOrNew(['name' => 'Sad']);
        $feel->fill([
            'icon' => 'fa-frown',
            'color' => '#9E9E9E'
        ])->save();
    }
}

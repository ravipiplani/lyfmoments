<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = Status::firstOrNew(['body' => 'DRAFT']);
        $status->fill([
            'label' => 'Draft'
        ])->save();

        $status = Status::firstOrNew(['body' => 'PAYMENT_INITIATED']);
        $status->fill([
            'label' => 'Payment Initiated'
        ])->save();

        $status = Status::firstOrNew(['body' => 'PAYMENT_CAPTURED']);
        $status->fill([
            'label' => 'Payment Initiated'
        ])->save();

        $status = Status::firstOrNew(['body' => 'SCHEDULED']);
        $status->fill([
            'label' => 'Scheduled'
        ])->save();

        $status = Status::firstOrNew(['body' => 'EXPIRED']);
        $status->fill([
            'label' => 'Expired'
        ])->save();
    }
}

<?php

namespace App;

use Razorpay\Api\Api;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

	protected $casts = [
        'notes' => 'array'
	];

	public function moment() {
        return $this->belongsTo(Moment::class);
    }

    public static function create_order($receipt, $amount) {
        $rp_api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        return $rp_api->order->create([
            'receipt' => $receipt,
            'amount' => $amount,
            'currency' => 'INR',
            'payment_capture' => 1
        ])->id;
    }
}

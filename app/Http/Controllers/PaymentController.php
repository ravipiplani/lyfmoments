<?php

namespace App\Http\Controllers;

use App\Moment;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Razorpay\Api\Errors\SignatureVerificationError;

class PaymentController extends Controller
{
    public function initiate() {
        try {
            //create razorpay order
            $rp_api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
            $amount = Cart::total(0) * 100;
            $rp_order = $rp_api->order->create([
                'receipt' => 1,
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1
            ]);
            return response()->json([
                'success' => true,
                'rp_order_id' => $rp_order->id,
                'amount' => $amount
            ]);
        }
        catch(\Exception $e) {
            return response()->json([
                'success' => false
            ]);
        }
    }
    
    public function response() {
        $success = true;
        $razorpay_payment_id = request()->get('razorpay_payment_id');
        $razorpay_signature = request()->get('razorpay_signature');
        $razorpay_order_id = request()->get('razorpay_order_id');
        if (empty($razorpay_payment_id === false)) {
            $rp_api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));

            try {
                $attributes = [
                    'razorpay_order_id' => $razorpay_order_id,
                    'razorpay_payment_id' => $razorpay_payment_id,
                    'razorpay_signature' => $razorpay_signature
                ];
                $rp_api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }
        else {
            $success = false;
        }
        if ($success === true) {
            //store payment details
            $payment = $rp_api->payment->fetch($razorpay_payment_id);
            $razorpay_order_id = $payment->order_id;
            $moment = Moment::where('razorpay_order_id', $razorpay_order_id)->first();
            $moment->update_status('PAYMENT_CAPTURED');
            $amount = $moment->amount;
            if ($moment && ($amount == $payment->amount)) {
                $payment = $moment->payment()->create([
                    'razorpay_payment_id' => $razorpay_payment_id,
                    'entity' => $payment->entity,
                    'amount' => $payment->amount,
                    'currency' => $payment->currency,
                    'status' => $payment->status,
                    'method' => $payment->method,
                    'desc' => $payment->description,
                    'international' => $payment->international,
                    'captured' => $payment->captured,
                    'email' => $payment->email,
                    'contact' => $payment->contact,
                    'fee' => $payment->fee,
                    'tax' => $payment->tax,
                    'notes' => null
                ]);
                $moment->fill([
                    'is_paid' => true
                ])->save();
                $moment->schedule();
                return redirect()->route('moments.created', ['moment' => $moment]);
            }
            else {
                return "<b>Transaction status is failure</b>" . "<br/>";
            }
        }
        else {
            return "<b>Transaction status is failure</b>" . "<br/>";
        }
	}
}

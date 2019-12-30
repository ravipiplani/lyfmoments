<?php

namespace App\Http\Controllers;

use App\User;
use App\Moment;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;

class MomentController extends Controller
{
    public function store(Request $request) {
        $input_data = $request->all();
        $validator = Validator::make($input_data, [
                'images.*' => 'required|mimes:jpg,jpeg,png,bmp|max:20000',
            ], [
                'image_file.*.required' => 'Please upload an image',
                'image_file.*.mimes' => 'Only jpeg,png and bmp images are allowed',
                'image_file.*.max' => 'Sorry! Maximum allowed size for an image is 20MB'
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json([
                'success' => false,
                'message' => $messages
            ]);
        }
        $moment = Moment::create([
            'feel_id' => $request->get('feel_id'),
            'message' => $request->get('message'),
        ]);
        $is_not_unique = true;
        while ($is_not_unique) {
            try {
                $moment->link = md5(uniqid($moment->id, true));
                $moment->save();
                $is_not_unique = false;
            }
            catch (QueryException $e) {
                $is_not_unique = true;
            }
        }
        $moment->link = md5(uniqid($moment->id, true));
        $moment->save();
        $moment->update_status('DRAFT');
        foreach ($request->file('images') as $file) {
            $filePath = "moments/$moment->id/images/".new_guid().".".$file->extension();
            Storage::disk('s3')->put($filePath, File::get($file), 'public');
            $moment->images()->create([
                'url' => $filePath
            ]);
        }
        return response()->json([
            'success' => true,
            'moment_id' => $moment->id
        ]);
    }

    public function update(Moment $moment, Request $request) {
        $this->validate($request, [
            'update' => 'required'
        ]);
        $update = $request->get('update');
        $success = false;
        if ($update == 'schedule') {
            //create user
            $share_with = [
                'name' => $request->get('receiver_name'),
                'email' => $request->get('receiver_email'),
                'mobile' => $request->get('receiver_mobile'),
            ];
            //update moment
            $share_at = Carbon::parse($request->get('moment_datetime')." ".str_pad($request->get('hour'), 2, "0").":".str_pad($request->get('minutes'), 2, "0"));
            $moment->fill([
                'share_with' => $share_with,
                'share_at' => $share_at
            ])->save();
            $success = true;
            $response = [
                'success' => true
            ];
        }
        else if ($update == 'sender') {
            //create user
            $user = User::firstOrNew(['mobile' => $request->get('sender_mobile')]);
            if (!$user->exists) {
                $user->fill([
                    'name' => $request->get('sender_name'),
                    'mobile' => $request->get('sender_mobile'),
                ])->save();
            }
            //create razorpay order
            $amount = config('constants.moment_price.IN') * 100;
            if (empty($moment->razorpay_order_id)) {
                $rp_order_id = Payment::create_order($moment->id, $amount);
            }
            else {
                $rp_order_id = $moment->razorpay_order_id;
            }
            //update moment
            $moment->fill([
                'user_id' => $user->id,
                'razorpay_order_id' => $rp_order_id,
                'amount' => $amount
            ])->save();
            $moment->update_status('PAYMENT_INITIATED');
            $success = true;
            $response = [
                'success' => true,
                'rp_order_id' => $rp_order_id,
                'amount' => $amount,
                'user' => $user->only('name', 'email', 'mobile')
            ];
        }
        if ($success) {
            return response()->json($response);
        }
        else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function show($link) {
        $moment = Moment::where(['link' => $link])->firstOrFail();
        return view('moment', compact('moment'));
    }

    public function scheduled(Moment $moment) {
        return view('scheduled', compact('moment'));
    }
}

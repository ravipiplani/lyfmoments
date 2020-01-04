<?php

namespace App\Http\Controllers;

use App\Feel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $feels = Feel::get();
        return view('welcome', compact('feels'));
    }

    public function refund_policy() {
        return view('refund');
    }

    public function tnc() {
        return view('tnc');
    }

    public function pp() {
        return view('privacy-policy');
    }
}

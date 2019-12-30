<?php

namespace App\Http\Controllers;

use App\Feel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $feels = Feel::get();
        return view('welcome', compact('feels'));
    }
}

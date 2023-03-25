<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeC extends Controller
{
    public function index()
    {
        return view('guest.home');
    }
}

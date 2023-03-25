<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrController extends Controller
{
    public function index()
    {
        $guest = Auth::user()->guest;
        return view('guest.my-qr', compact('guest'));
    }
    public function scanQr(Guest $guest)
    {
        dd(Auth::user());
        if (Auth::user() == null) {
            # code...
        }
        $guest->is_present = true;
        $guest->save();
    }
}

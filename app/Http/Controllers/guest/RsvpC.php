<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RsvpC extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $u = new User();
        $u->name = $request->name;
        $u->password = 'password';
        $u->role = 'guest';
        $u->save();

        $g = new Guest();
        $g->number_of_person = $request->number_of_person;
        $g->phone = $request->phone;
        $g->status = $request->status;
        $g->user_id = $u->id;
        $g->save();

        Auth::login($u, $remember = true);
        return redirect()->route('home');
        // dd(Auth::user());
    }
}

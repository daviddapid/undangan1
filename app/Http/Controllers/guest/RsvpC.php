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
        $back_to_home = redirect()->route('home');
        $back_to_home = ($g->status == 'attend') ?
            $back_to_home->with('success-attend', 'Anda dapat melihat QR dengan cara klik tombol pada pojok kanan layar atas. QR akan discan pada saat hadir ditempat.') :
            $back_to_home->with('success-absent', 'Anda Masih dapat merubah status kehadiran pada form RSVP jika berubah pikiran untuk menghadiri acara');

        return $back_to_home;
        // dd(Auth::user());
    }
    public function update(User $user, Request $request)
    {
        // dd($user);
        $g = $user->guest;
        $user->name = $request->name;
        $g->number_of_person = $request->number_of_person;
        $g->phone = $request->phone;
        $g->status = $request->status;
        $user->save();
        $g->save();

        $back_to_home = redirect()->route('home');
        $back_to_home = ($g->status == 'attend') ?
            $back_to_home->with('success-attend', 'Anda dapat melihat QR dengan cara klik tombol pada pojok kanan layar atas. QR akan discan pada saat hadir ditempat.') :
            $back_to_home->with('success-absent', 'Anda Masih dapat merubah status kehadiran pada form RSVP jika berubah pikiran untuk menghadiri acara');

        return $back_to_home;
    }
}

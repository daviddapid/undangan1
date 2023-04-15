<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthC extends Controller
{
    public function login()
    {
        return view('backoffice.login');
    }
    public function loginAction(Request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([...$credentials, 'role' => ['admin', 'superadmin']])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('failed', 'Harap Masukan Data Yang Benar');
    }
}

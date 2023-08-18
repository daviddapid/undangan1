<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DDay;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    function waktuAcara()
    {
        $dday = DDay::first();
        $countDownTime = date('Y-m-d\TH:i:s', strtotime($dday->date_time));

        return view('backoffice.master.waktu-acara', compact('dday', 'countDownTime'));
    }
    function setWaktuAcara(DDay $dday, Request $request)
    {
        $dday->date_time = $request->date_time;
        $dday->save();

        return back()->with('success', 'sukses memperbarui data');
    }
}

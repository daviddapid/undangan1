<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CoupleStory;
use App\Models\DDay;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasterController extends Controller
{
    /*================
        WAKTU ACARA
    ==================*/
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

    /*================
        COUPLE STORY
    ==================*/
    // function coupleStory()
    // {
    //     $stories = CoupleStory::all();
    //     return view('backoffice.master.couple_story.index', compact('stories'));
    // }
    // function coupleStoryStore(Request $request)
    // {
    //     $request->validate([
    //         'description' => 'max:207'
    //     ]);

    //     CoupleStory::_store($request);
    //     return back()->with('success', 'Sukses menambahkan data baru');
    // }
    // function coupleStoryUpdate(CoupleStory $couplestory, Request $request)
    // {
    //     $request->validate([
    //         'description' => 'max:207'
    //     ]);

    //     CoupleStory::_update($couplestory, $request);

    //     return back()->with('success', 'Sukses memperbarui data');
    // }
    // function coupleStoryDelete(CoupleStory $couplestory)
    // {
    //     CoupleStory::_delete($couplestory);
    //     return back()->with('success', 'Sukses menghapus data');
    // }
}

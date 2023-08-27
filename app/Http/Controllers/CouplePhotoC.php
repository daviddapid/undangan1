<?php

namespace App\Http\Controllers;

use App\Models\CouplePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CouplePhotoC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = CouplePhoto::all();
        return view('backoffice.master.couple_photo.index', compact('photos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CouplePhoto $couplePhoto)
    {
        //cek apakah file exist
        if ($couplePhoto->photo != null && Storage::exists($couplePhoto->photo)) {
            Storage::delete($couplePhoto->photo);
        }
        // upload
        $file_name = time() . '-' . $request->file('photo')->getClientOriginalName();
        $couplePhoto->photo = $request->file('photo')->storeAs('couple-moment-photo', $file_name);
        $couplePhoto->save();

        return back()->with('success', 'Sukses memperbarui data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CoverPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverPhotoC extends Controller
{

    public function index()
    {
        $photo = CoverPhoto::first();
        return view('backoffice.master.cover_photo.index', compact('photo'));
    }

    public function update(Request $request, CoverPhoto $coverPhoto)
    {
        if ($coverPhoto->photo != null && Storage::exists($coverPhoto->photo)) {
            Storage::delete($coverPhoto->photo);
        }
        // upload
        $file_name = time() . '-' . $request->file('photo')->getClientOriginalName();
        $coverPhoto->photo = $request->file('photo')->storeAs('cover-photo', $file_name);
        $coverPhoto->save();

        return back()->with('success', 'sukses memperbarui foto');
    }
}

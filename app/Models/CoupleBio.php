<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoupleBio extends Model
{
    use HasFactory;

    static function _create(Request $request)
    {
        $b = new CoupleBio();
        $b->name = $request->name;
        $b->description = $request->description;
        $b->instagram = $request->instagram;
        $b->facebook = $request->facebook;
        $b->twitter = $request->twitter;

        $file_name = time() . '-' . $request->file('photo')->getClientOriginalName();
        $b->photo =  $request->file('photo')->storeAs('couple-bio', $file_name);
        $b->save();
    }
    static function _update(Request $request, CoupleBio $coupleBio)
    {
        $coupleBio->name = $request->name;
        $coupleBio->description = $request->description;
        $coupleBio->instagram = $request->instagram;
        $coupleBio->facebook = $request->facebook;
        $coupleBio->twitter = $request->twitter;
        if ($request->file('photo') != null) {
            // hapus photo lama
            Storage::delete($coupleBio->photo);
            // insert photo baru
            $coupleBio->photo = self::storePhoto($request->file('photo'));
        }
        $coupleBio->save();
    }

    // util func
    static function storePhoto($file): string
    {
        $filename =  time() . '-' . $file->getClientOriginalName();
        return $file->storeAs('couple-bio', $filename);
    }
}

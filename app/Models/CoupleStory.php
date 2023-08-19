<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoupleStory extends Model
{
    use HasFactory;

    // CRUD FUNCTION
    static function _store(Request $request)
    {
        $story = new CoupleStory();
        $story->title = $request->title;
        $story->date = $request->date;
        $story->description = $request->description;
        $story->photo = CoupleStory::storePhoto($request->file('photo'));
        $story->save();
    }
    static function _update(CoupleStory $couplestory, Request $request)
    {
        $couplestory->title = $request->title;
        $couplestory->date = $request->date;
        $couplestory->description = $request->description;
        if ($request->file('photo') != null) {
            // hapus photo lama
            Storage::delete($couplestory->photo);
            // insert photo baru
            $couplestory->photo = self::storePhoto($request->file('photo'));
        }
        $couplestory->save();
    }
    static function _delete(CoupleStory $couplestory)
    {
        // delete photo
        Storage::delete($couplestory->photo);
        $couplestory->delete();
    }

    // UTIL FUNCTION
    function formatedDate(): string
    {
        return date_format(date_create($this->date), 'd F Y');
    }

    static function storePhoto($file): string
    {
        $filename =  time() . '-' . $file->getClientOriginalName();
        return $file->storeAs('couple-story-photo', $filename);
    }
}

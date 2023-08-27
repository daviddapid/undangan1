<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Location extends Model
{
    use HasFactory;

    // UTIL FUNCTION
    function getFormatedDate(): string
    {
        return Carbon::parse($this->date)->format('l, d F Y');
    }
    function getFormatedTime(): string
    {
        return Carbon::parse($this->time_start)->format('h:i A') . ' - ' . Carbon::parse($this->time_end)->format('h:i A');
    }
    // CRUD FUNCTION
    static function _store(Request $request)
    {
        $s = new Location();
        $s->title = $request->title;
        $s->date = $request->date;
        $s->time_start = $request->time_start;
        $s->time_end = $request->time_end;
        $s->map = $request->map;
        $s->save();
    }

    static function _update(Request $request, Location $location)
    {
        $location->title = $request->title;
        $location->date = $request->date;
        $location->time_start = $request->time_start;
        $location->time_end = $request->time_end;
        $location->map = $request->map;
        $location->save();
    }
}

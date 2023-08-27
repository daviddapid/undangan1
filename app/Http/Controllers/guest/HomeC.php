<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\CoupleBio;
use App\Models\CouplePhoto;
use App\Models\CoupleStory;
use App\Models\DDay;
use App\Models\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeC extends Controller
{
    public function index()
    {
        $comments = Comment::where('is_show', true)->get();
        $user = Auth::user();
        $dday = DDay::first();
        $ddate = Carbon::parse($dday->date_time)->format('d F Y');
        $countDownTime = date('Y-m-d H:i:s', strtotime($dday->date_time));
        $stories = CoupleStory::all();
        $photos = CouplePhoto::all();
        $couples_bio = CoupleBio::all();
        $locations = Location::all();

        return view('guest.home', compact('comments', 'user', 'countDownTime', 'stories', 'photos', 'couples_bio', 'ddate', 'locations'));
    }
    public function sendComment(Request $request)
    {
        $c = new Comment();
        $c->name = $request->name;
        $c->message = $request->message;
        $c->save();
        return redirect(route('home') . '#comments');
    }
}

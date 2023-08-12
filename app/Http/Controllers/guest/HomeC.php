<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeC extends Controller
{
    public function index()
    {
        $comments = Comment::where('is_show', true)->get();
        return view('guest.home', compact('comments'));
    }
    public function sendComment(Request $request)
    {
        $c = new Comment();
        $c->name = $request->name;
        $c->message = $request->message;
        $c->save();
        return back();
    }
}

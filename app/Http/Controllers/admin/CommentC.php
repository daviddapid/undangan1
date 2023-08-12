<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentC extends Controller
{
    public function index()
    {
        $comments = Comment::latest()->get();
        $ditampilkan = $comments->where('is_show', true)->count();
        $disembunyikan = $comments->where('is_show', false)->count();
        return view('backoffice.comment.index', compact('comments', 'ditampilkan', 'disembunyikan'));
    }
    public function updateVisiblity(Comment $comment, Request $request)
    {
        $comment->is_show = !$comment->is_show;
        $comment->save();
        $showed = Comment::query()->where('is_show', true)->count();
        $hidden = Comment::query()->where('is_show', false)->count();
        return [
            'showed' => $showed,
            'hidden' => $hidden
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function index(Request $request) {
        $data = $request->validate([
           'videoId' => 'required',

        ]);
        $comments = Comment::where('video_id', $data['videoId'])->orderBy('id', 'DESC')->get();
        return response($comments, 200);

    }

    public function store(Request $request) {

        $data = $request->validate([
            'body' => 'required|min:3',
            'videoId' => 'required'
        ]);
        $comment = Comment::create([
            'user_id'      => Auth::user()->id,
            'body'         => $data['body'],

            'is_published' => 1,
            'video_id'     => $data['videoId']
        ]);

        return response($comment, 200);

    }
}

<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::where('user_id', Auth::user()->id)->orderBy('name', 'ASC')->get();
        return response()->json($playlists, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'isPrivate' => 'required'
        ]);

        $count = Playlist::where('name', $request['name'])->where('user_id', $request->user()->id)->count();

        $name = $request->input('name');
        if ($count) {
            return response()->json(['message' => "Playlist ". $name ." exist."], 403);
        }

        $playlist = Playlist::create([
            'name' => $request['name'],
            'user_id' => $request->user()->id,
            'is_private' => $request['isPrivate']
        ]);
        return response()->json($playlist, 201);
    }
}

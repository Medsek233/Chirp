<?php

namespace App\Http\Controllers;

use App\Models\Chirp;

class FriendChirpController extends Controller
{
    public function myFriendsChirps()
    {
        return view('FriendsChirps.index', [
            'chirps' => Chirp::with('user', 'comments')->where('user_id', '<>', auth()->id())->paginate(6),
        ]);
    }
}

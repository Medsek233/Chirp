<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use App\Models\Comment;
use App\Notifications\ChirpCommented;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller

{
    use Notifiable;
    public function index()
    {
        return view('Mychirps.index', [
            'comments' => Comment::with('chirp', 'user')->get(),
        ]);
    }

    public function store(Chirp $chirp, Request $request)
    {
        request()->validate([
            'body' => 'required',
        ]);
        $chirp->comments()->create([

            'user_id' => request()->user()->id,
            'body' => request('body'),
        ]);

        $comment_body = $request->body;
        $comment_from=Auth::user()->name;

        $user=User::firstWhere('id',$chirp->user_id);
        Notification::send($user, new ChirpCommented($chirp,$comment_from,$comment_body));

        return back();
    }
}

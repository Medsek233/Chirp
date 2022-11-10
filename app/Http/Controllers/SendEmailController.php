<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class SendEmailController extends Controller
{
    public function index(User $user)
    {
        return view('Emails.sendEmail', [
            'user_email' => User::whereNot('email', auth()->user()->email)->get(),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'required',
        ]);
        $subject = $request->subject;
        $message = $request->message;

        Mail::to($request->email)
            ->send(new SendEmail($subject, $message));

        return view('Mychirps.index', [
            'Mychirps' => Chirp::with('user')->latest()->get(),
        ]);
    }
}

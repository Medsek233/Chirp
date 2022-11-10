<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendChirpController;
use App\Http\Controllers\MyChirpController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->middleware('guest');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('Mychirps', [MyChirpController::class, 'index'])->name('Mychirps.index')
    ->middleware(['auth', 'verified']);
Route::post('MyChirps', [MyChirpController::class, 'store'])->name('Mychirps.store')
    ->middleware(['auth', 'verified']);
Route::get('MyChirps/{MyChirp}/edit', [MyChirpController::class, 'edit'])->name('Mychirps.edit')
    ->middleware(['auth', 'verified']);
Route::patch('MyChirps/{MyChirp}', [MyChirpController::class, 'update'])->name('Mychirps.update')
    ->middleware(['auth', 'verified']);
Route::delete('MyChirps/{MyChirp}', [MyChirpController::class, 'destroy'])->name('Mychirps.destroy')
    ->middleware(['auth', 'verified']);
Route::post('Friends_chirps/{chirp}/comments', [CommentController::class, 'store'])->name('Mycomment.store')
->middleware('auth', 'verified');

Route::get('Friends_chirps', [FriendChirpController::class, 'myFriendsChirps'])
    ->name('FriendsChirps');

Route::get('send_Email', [SendEmailController::class, 'index'])
    ->name('sendEmail.index')
    ->middleware('auth', 'verified');

Route::post('send_Email', [SendEmailController::class, 'create'])
    ->name('sendEmail.create')
    ->middleware('auth', 'verified');
require __DIR__.'/auth.php';

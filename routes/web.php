<?php

use App\Http\Controllers\MyChirpController;
use App\Http\Controllers\FriendChirpController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('Mychirps',[MyChirpController::class,'index'])->name('Mychirps.index')
    ->middleware(['auth', 'verified']);
Route::post('MyChirps',[MyChirpController::class,'store'])->name('Mychirps.store')
    ->middleware(['auth', 'verified']);
Route::get('MyChirps/{MyChirp}/edit',[MyChirpController::class,'edit'])->name('Mychirps.edit')
    ->middleware(['auth', 'verified']);
Route::patch('MyChirps/{MyChirp}',[MyChirpController::class,'update'])->name('Mychirps.update')
    ->middleware(['auth', 'verified']);
Route::delete('MyChirps/{MyChirp}',[MyChirpController::class,'destroy'])->name('Mychirps.destroy')
    ->middleware(['auth', 'verified']);



Route::get('Friends_chirps',[FriendChirpController::class,'myFriendsChirps'])
    ->name('FriendsChirps');

require __DIR__.'/auth.php';

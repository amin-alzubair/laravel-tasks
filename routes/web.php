<?php

use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
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
})->name('home');

Route::post('/add-friend',[FriendController::class,'add'])->name('friends.add');
Route::post('/accept-friend',[FriendController::class,'acceptRequest'])->name('friends.accept');
Route::post('/deny-friend',[FriendController::class,'denyRequest'])->name('friends.deny');
Route::post('/unfriend-friend',[FriendController::class,'unfriend'])->name('friends.unfriend');
Route::get('/get-friend/{id}',[FriendController::class,'getFriend'])->name('get-friends');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/show-profile/{user}',[ProfileController::class,'showProfile'])->middleware('isHasProfile')->name('show.profile');
Route::get('/create-profile',[ProfileController::class,'create']);
Route::post('/update-profile',[ProfileController::class,'updateProfile'])->name('update.profile');
Route::resource('/posts',BlogpostController::class);

require __DIR__.'/auth.php';

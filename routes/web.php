<?php

use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\ProfileController;
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
})->middleware(['auth'])->name('dashboard');
Route::get('/show-profile/{user}',[ProfileController::class,'showProfile'])->middleware('isHasProfile');
Route::get('/create-profile',[ProfileController::class,'create']);
Route::post('/update-profile',[ProfileController::class,'updateProfile'])->name('update.profile');
Route::resource('/posts',BlogpostController::class);
require __DIR__.'/auth.php';

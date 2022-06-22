<?php

use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ProfileController;
use App\Models\Blogpost;
use App\Models\User;
use App\Notifications\SendMessages;
//use Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
/*
Route::get('/', function () {
    $users = User::with('posts')->get();
    return view('welcome',['users'=>$users]);
})->name('home');


Route::post('/add-friend',[FriendController::class,'add'])->name('friends.add');
Route::post('/accept-friend',[FriendController::class,'acceptRequest'])->name('friends.accept');
Route::post('/deny-friend',[FriendController::class,'denyRequest'])->name('friends.deny');
Route::post('/unfriend-friend',[FriendController::class,'unfriend'])->name('friends.unfriend');
Route::get('/get-friend/{id}',[FriendController::class,'getFriend'])->name('friends.get-friends');
Route::get('/get-friend-requests',[FriendController::class,'getFriendRequests'])->name('friends.get-friendsrequests');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/show-profile/{user}',[ProfileController::class,'showProfile'])->middleware('isHasProfile')->name('show.profile');
Route::get('/create-profile',[ProfileController::class,'create']);
Route::post('/update-profile',[ProfileController::class,'updateProfile'])->name('update.profile');
Route::resource('/posts',BlogpostController::class);

*/


//Profile
Route::get('/create-profile',[ProfileController::class,'create']);
Route::post('/update-profile',[ProfileController::class,'updateProfile'])->name('update.profile');
Route::get('/my-profile/edit',[ProfileController::class,'editProfile'])->name('edit.profile');
Route::get('/show-profile/{user}',[ProfileController::class,'showProfile'])->middleware('isHasProfile')->name('show.profile');


//friendship

Route::post('/add-friend',[FriendController::class,'add'])->name('friends.add');
Route::post('/accept-friend',[FriendController::class,'acceptRequest'])->name('friends.accept');
Route::post('/deny-friend',[FriendController::class,'denyRequest'])->name('friends.deny');
Route::post('/unfriend-friend',[FriendController::class,'unfriend'])->name('friends.unfriend');
Route::get('/get-friends/{id}',[FriendController::class,'getFriends'])->name('friends.get-friends');
Route::get('/get-friend-requests',[FriendController::class,'getFriendRequests'])->name('friends.get-friendsrequests');



Route::resource('/posts',BlogpostController::class);

require __DIR__.'/auth.php';

Route::get('/',function(){

    $posts = Blogpost::orderBy('created_at','desc')->get()->map(function($post){
        return [
            'id'             =>$post->id,
            'body'           =>$post->body,
            'username'       =>$post->user->name,
            'avatar'         =>$post->user->avatar,
            'userid'         =>$post->user->id,
            'publish_at'     =>$post->publish_at(),
            'likersCount'     =>$post->likersCount(),
            'isLikedBy'         =>$post->isLikedBy(auth()->user())
        ];
    });
    $users = User::all()->map(function($user){
        return [
            'id'=>$user->id,
            'name'=>$user->name,
            'avatar'=>$user->avatar,
            'friendCount'=>$user->getFriendsCount(),
            'postCount'=>$user->posts->count()
        ];
    })->take(3);
    return inertia('home',['users'=>$users,'posts'=>$posts]);
});

Route::get('/users',function(){
    return inertia('users');
});

Route::get('/settings',function(){
    return inertia('settings');
});

Route::get('star/{post}', function(Blogpost $post){
    auth()->user()->toggleLike($post);
    return back();
})->middleware('auth');
//Route::get('/posts',[BlogpostController::class,'index']);

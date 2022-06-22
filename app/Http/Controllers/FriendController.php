<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\SendFriendRequestNotification;

class FriendController extends Controller
{
    public function add()
    {
        $user = User::findOrfail(request('user_id'));
        auth()->user()->befriend($user);

        $user->notify(new SendFriendRequestNotification());

        return back();
    }

    public function acceptRequest()
    {
        auth()->user()->acceptFriendRequest(User::findOrfail(request('user_id')));

        return back();
    }

    public function denyRequest()
    {
        auth()->user()->denyFriendRequest(User::findOrfail(request('user_id')));

        return back();
    }

    public function unfriend()
    {
        auth()->user()->unfriend(User::findOrfail(request('user_id')));

        return back();
    }

    public function block()
    {
        auth()->user()->blockFriend(User::findOrfail(request('user_id')));

        return back();
    }

    public function getFriends($id){
        $friends =User::find($id)->getFriends()->map(function($friends){
            return $friends->getFriendsMap($friends);
        });
       return inertia('profile/GetFriends',['friends'=>$friends]);
    }

    public function getFriendRequests(){
        $friends = auth()->user()->getFriendRequests()->map(function($friend){
            return [
                'sender_id'=>$friend->sender_id,
                'avatar'=>$friend->sender->avatar,
                'sender_name'=>$friend->sender->name
            ];
        });

        return inertia('profile/GetFriendRequests',compact('friends'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function add()
    {

        auth()->user()->befriend(User::findOrfail(request('user_id')));

        return response()->json(['stauts'=>'requested','id'=>'unfriend']);
    }

    public function acceptRequest()
    {
        auth()->user()->acceptFriendRequest(User::findOrfail(request('user_id')));

        return response()->json(['stauts' => 'accepted']);
    }

    public function denyRequest()
    {
        auth()->user()->denyFriendRequest(User::findOrfail(request('user_id')));

        return response()->json(['stauts' => 'rejected']);
    }

    public function unfriend()
    {
        auth()->user()->unfriend(User::findOrfail(request('user_id')));

        return response()->json(['stauts' => 'add friend']);
    }

    public function block()
    {
        auth()->user()->blockFriend(User::findOrfail(request('user_id')));

        return response()->json(['stauts' => 'bolcked']);
    }

    public function getFriend($id){
        $user =User::find($id);
       return view('friends.get-friends',['friends'=>$user->getFriends()]);
    }

    public function getFriendRequests(){
        $friendRequests = auth()->user()->getFriendRequests();
        return view('friends.get-friendsrequests',compact('friendRequests'));
    }
}

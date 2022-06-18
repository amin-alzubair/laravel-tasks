<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function create(){
        
        return inertia('profile/create');
    }
    public function showProfile(User $user)
    {
        $posts =Blogpost::where('user_id',$user->id)->get()->map(function($post){
            return [
                'id'=>$post->id,
                'body'=>$post->body,
                'publish_at'=>$post->publish_at(),
                'likersCount'=>$post->likerscount(),
                'isLikedBy'=>Auth::check() ? $post->isLikedBy(auth()->user()) : false, 
            ];
        });
        $user = [
            'id'=>$user->id,
            'name'=>$user->name,
            'avatar'=>$user->avatar,
            'sentToOthers' =>auth()->user()->hasSentFriendRequestTo($user),
            'sentToYou' =>$user->hasSentFriendRequestTo(auth()->user()),
            'isFriendWith'=>auth()->user()->isFriendWith($user),
            'friends'=>$user->getFriends()->take(4),
            'getFriendsCount'=>$user->getFriendsCount()
        ];

        return inertia('profile/show-profile',compact('user','posts'));
    }

    public function editProfile() {
        $profile = Auth::user()->profile()->select('countery','city')->first();
        return inertia('profile/EditProfile',compact('profile'));

    }

    public function updateProfile(){
        $profile= Profile::where('user_id',Auth::id())->first();
        if(!$profile){
            Profile::create([
                'user_id'=>Auth::id(),
                'city'=>request('city'),
                'countery'=>request('countery')
            ]);

            return back()->with('message','Porfile updated successfull');
        }
        $profile->update([
            'user_id'=>Auth::id(),
            'city'=>request('city'),
            'countery'=>request('countery')
        ]);

        return back()->with('message','Porfile updated successfull');
    }
}

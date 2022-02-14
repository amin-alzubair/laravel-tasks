<?php

namespace App\Http\Controllers;

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
        
        return view('profile.create');
    }
    public function showProfile(User $user)
    {
        return view('profile.show',compact('user'));
    }

    public function updateProfile(){
        $profile= Profile::where('user_id',Auth::id())->first();
        if(!$profile){
            Profile::create([
                'user_id'=>Auth::id(),
                'city'=>request('city'),
                'countery'=>request('countery')
            ]);

            return 'created success';
        }
        $profile->update([
            'user_id'=>Auth::id(),
            'city'=>request('city'),
            'countery'=>request('countery')
        ]);

        return 'updated success';
    }
}

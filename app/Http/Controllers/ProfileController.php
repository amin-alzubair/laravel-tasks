<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function showProfile(User $user)
    {
        return view('profile.show',compact('user'));
    }
}

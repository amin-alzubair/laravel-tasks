<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
class CheckUserHasProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_ids =Profile::select('user_id')->get();
        
         
        $plucked = $user_ids->pluck('user_id')->toArray();
        
        if(Auth::check() && in_array(Auth::id(),$plucked)){
            return $next($request);
        }

        return redirect('/create-profile');
        
    }
}

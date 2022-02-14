<?php

namespace App\Policies;

use App\Models\Blogpost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogpostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user , Blogpost $blogpost){
        
            return $user->id === $blogpost->user_id;
       
    }

    public function update(User $user , Blogpost $blogpost){
        
            return $user->id === $blogpost->user_id;
        
    }

    public function delete(User $user , Blogpost $blogpost){

            return $user->id === $blogpost->user_id;
     
}

}
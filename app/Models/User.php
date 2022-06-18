<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Multicaret\Acquaintances\Traits\Friendable;
use Multicaret\Acquaintances\Traits\CanFollow;
use Multicaret\Acquaintances\Traits\CanBeFollowed;
use Multicaret\Acquaintances\Traits\CanLike;
use Multicaret\Acquaintances\Traits\CanBeLiked;
use Multicaret\Acquaintances\Traits\CanRate;
use Multicaret\Acquaintances\Traits\CanBeRated;
use Multicaret\Acquaintances\Traits\CanBeViewed;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Friendable, CanFollow, CanBeFollowed, CanLike, CanBeLiked, CanBeLiked, CanRate, CanBeRated, CanBeViewed;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function posts(){
        return $this->hasMany(Blogpost::class);
    }

    public function receivesBroadcastNotificationsOn(){
        return 'App.Models.User.'.$this->id;
    }

    public function getFriendsMap($friends)
    {
        return [
            'id'=>$friends->id,
            'name'=>$friends->name,
            'avatar'=>$friends->avatar,
            'sentToOthers' =>auth()->user()->hasSentFriendRequestTo($friends),
            'sentToYou' =>$friends->hasSentFriendRequestTo(auth()->user()),
            'isFriendWith'=>auth()->user()->isFriendWith($friends),
            'friends'=>$friends->getFriends()->take(4),
            'getFriendsCount'=>$friends->getFriendsCount()

            ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Multicaret\Acquaintances\Traits\CanBeLiked;

class Blogpost extends Model
{
    use HasFactory, CanBeLiked;
    public $table = 'blogposts';
    const PUBLIC      = 1;
    const FRINDE      = 2;
    const SPECIFIC    = 3;
    const ONLY_MY     = 4;
    protected $fillable = [
        'body',
        'stauts',
        'visibility',
        'user_id',
    ];

    protected $with = ['user'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publish_at(){
        return $this->created_at->diffForHumans();
    }
}

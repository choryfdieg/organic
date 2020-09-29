<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = ['title', 'comment', 'posted', 'user_id', 'post_id'];


    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }

//     public function image(){
//         return $this->hasOne(PostImage::class)->withDefault();
//     }
}

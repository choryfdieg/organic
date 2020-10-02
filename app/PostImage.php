<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostImage extends Model
{
    protected $fillable = ['post_id', 'image'];


    public function post(){
        return $this->belongsTo(Post::class)->withDefault();
    }


    // public function getImageAttribute($value){
    //     return Storage::url($value);
    // }

    public function getImageUrl(){
        return Storage::url($this->image);
    }
}

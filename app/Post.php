<?php

namespace App;

use App\Tag;
use App\Category;
use App\PostImage;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'url_clean', 'content', 'category_id', 'posted'];


    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function image(){
        return $this->hasOne(PostImage::class);
    }

    public function images(){
        return $this->hasMany(PostImage::class);
    }

    // original
    // public function tags()
    // {
    //     return $this->belongsToMany(Tag::class);
    // }

    // relacion polimorfica
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'Taggable');
    }
    
}

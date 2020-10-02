<?php

namespace App;

use App\Post;
use App\Vendor;
use App\CategoryImage;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'url_clean'];

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function vendor(){
        return $this->hasMany(Vendor::class);
    }

    public function image(){
        return $this->hasOne(CategoryImage::class);
    }

}

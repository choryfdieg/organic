<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $fillable = ['category_id', 'image'];


    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function getImageUrl(){
        return Storage::url($this->image);
    }
}

<?php

namespace App;

use App\Tag;
use App\City;
use App\Category;
use App\VendorImage;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['title' , 'url_clean', 'phone', 'email', 'address', 'category_id', 'city_id',
                            'description', 'long_description', 'service_description', 'posted'];
    
    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function city(){
        return $this->belongsTo(City::class)->withDefault();
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'Taggable');
    }

    public function image(){
        return $this->hasOne(VendorImage::class);
    }

    public function images(){
        return $this->hasMany(VendorImage::class);
    }
}

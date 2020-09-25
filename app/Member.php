<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['title' ,'description', 'url_clean', 'phone', 'email', 'posted'];
    
    public function category(){
        return $this->belongsTo(Category::class)->withDefault();
    }
}

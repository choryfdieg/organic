<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'state'];

    public function vendor(){
        return $this->hasMany(Vendor::class);
    }
}

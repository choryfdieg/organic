<?php

namespace App;

use App\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VendorImage extends Model
{
    protected $fillable = ['vendor_id', 'image'];


    public function vendor(){
        return $this->belongsTo(Vendor::class)->withDefault();
    }

    public function getImageUrl(){
        return Storage::url($this->image);
    }
}

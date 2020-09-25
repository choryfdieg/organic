<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'url_clean', 'short_description', 'description', 
                            'price', 'offer_price', 'stock', 'member_id', 'type_product_id', 'category_product_id', 'status_product_id' ,'posted'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','image_url','category_id'
    ];

    public function category()
    {
        return $this->belongsTo('\App\Models\Category' , 'category_id' );
    }

    public function sub_category()
    {
        return $this->belongsTo('\App\Models\Category' , 'parent_id' );
    }

    public function product_providers()
    {
        return $this->hasMany('\App\Models\ProductProvider' , 'product_id' );
    }
}

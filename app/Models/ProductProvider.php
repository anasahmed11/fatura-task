<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProvider extends Model
{
    protected $fillable = [
        'product_id','provider_id','price','available'
    ];

    public function product()
    {
        return $this->belongsTo('\App\Models\Product' , 'product_id' );
    }

    public function provider()
    {
        return $this->belongsTo('\App\Models\Provider' , 'provider_id' );
    }
}

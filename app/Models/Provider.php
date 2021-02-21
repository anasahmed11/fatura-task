<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name'
    ];

    public function product_providers()
    {
        return $this->hasMany('\App\Models\ProductProvider' , 'provider_id' );
    }
}

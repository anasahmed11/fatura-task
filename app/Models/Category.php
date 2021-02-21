<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany('\App\Models\Product' , 'category_id' );
    }

    public function sub_categories()
    {
        return $this->hasMany(self::class , 'parent_id' );
    }

    public function category()
    {
        return $this->belongsTo('\App\Models\Category' , 'parent_id' );
    }

}

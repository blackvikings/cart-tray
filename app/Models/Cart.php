<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'product_name',
        'price',
        'image',
        'user_id'
    ];

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}

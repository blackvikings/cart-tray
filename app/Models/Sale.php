<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'sale_id',
        'order_status',
        'price'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

     public function product()
     {
         return $this->belongsToMany(Product::class, 'product_sale');
     }

     public function saledetails()
     {
         return $this->hasMany('App\SaleDetail', 'sale_id');
     }
}

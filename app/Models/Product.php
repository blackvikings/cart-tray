<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\sale;
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image_name',
        'description',
        'colors',
        'price',
        'discount',
        'tag',
        'category_id',
        'unit'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }


    public function sales()
    {
        return $this->belongsToMany(sale::class, 'product_sale');
    }

}

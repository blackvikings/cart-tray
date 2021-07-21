<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area',
        'city',
        'zip',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','id','address_id');
    }
}

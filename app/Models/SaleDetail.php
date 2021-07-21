<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'sale_details';


    protected $fillable = [
        'sale_id',
        'qty'
    ];

    public function sale()
    {
        return $this->belongsTo('App\sale');
    }

}

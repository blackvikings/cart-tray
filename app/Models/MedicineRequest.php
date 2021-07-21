<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicineRequest extends Model
{
    protected $table = 'medicine_requests';
    protected $fillable =  ['name', 'mobile_name', 'medicine_name'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table = 'buss';
    protected $fillable=[
        'company_id'    ,
        'address'       ,
        'plate'         ,
        'color'         ,
        'Manufacture'  ,
        'capacity'      ,
        'driver_id'     ,
        'level'  ,
    ];
}

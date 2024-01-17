<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
 
    use HasFactory;
    protected $table = 'companys';

    protected $fillable = [
        'name', 'service_id', 'address', 'logo' , 'phone', 'email' // Add 'name' to the $fillable array
    ];
}

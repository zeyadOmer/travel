<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function destination()
    {
        return $this->belongsTo(Location::class, 'destination_id');
    }
    // public function ticket()
    // {
    //     return $this->belongsTo(Ticket::class, 'trip_id', 'id');
    // }
    
    use HasFactory;
    protected $fillable = [
        'company_id',        
'location_id'       ,
'destination_id'    ,
'bus_id'            ,
'service_id'        ,
'start_date'        ,
'depart'            ,
'estimated_date'    ,
'arrive',
'status'            ,
    ];
}

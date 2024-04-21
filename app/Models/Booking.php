<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function flight_type()
    {
        return $this->belongsTo(Flighttype::class, 'flight_type_id');
    }
    


    public function flight() {
        return $this->belongsTo(Flight::class,'depart_flight_id');
    }



    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }
}

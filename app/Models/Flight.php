<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function rel_to_airport_origin_airport_id() {
        return $this->belongsTo(Airport::class, 'origin_airport_id' );
    }

    public function rel_to_airport_destination_airport_id() {
        return $this->belongsTo(Airport::class, 'destination_airport_id' );
    }

    public function rel_to_airline() {
        return $this->belongsTo(Airline::class, 'airline_id' );
    }

}

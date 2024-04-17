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

    public function originairport() {
        return $this->belongsTo(Airport::class, 'origin_airport_id');
    }

    public function destinationairport() {
        return $this->belongsTo(Airport::class, 'destination_airport_id');
    }

    public function getStatusTextAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Pending';
            case 1:
                return 'Refused';
            case 2:
                return 'Accepted';
            default:
                return 'Unknown'; // Optional: handle unexpected status
        }
    }

    public function airline() {
        return $this->belongsTo(Airline::class);
    }
}


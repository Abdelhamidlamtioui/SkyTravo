<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'airline',
        'origin',
        'destination',
        'departure_at',
        'arrival_at',
        'price',
        'created_at',
        'updated_at',
    ];

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}

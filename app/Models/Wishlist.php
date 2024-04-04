<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rel_to_flight() {
        return $this->belongsTo(Flight::class, 'flight_id' );
    }
}

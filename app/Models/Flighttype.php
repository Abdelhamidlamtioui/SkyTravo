<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flighttype extends Model
{
    use HasFactory;
    protected $table="flight_types";
    protected $guarded = ['id'];
}

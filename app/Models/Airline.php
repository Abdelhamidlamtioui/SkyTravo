<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Airline extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    protected $table="airline_companies";
    protected $guarded = ['id'];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function flights() {
        return $this->hasMany(Flight::class);
    }
}

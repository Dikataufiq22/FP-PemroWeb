<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Specify the table name if it's not the plural of the model name
    protected $table = 'bookings';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'product_id',
        'start_date',
        'end_date',
        'id_number',
        'pickup_method',
        'delivery_address',
        'status',
        'total_price',
    ];

    // Specify the attributes that should be cast to native types
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'total_price' => 'decimal:2',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define the relationship with the Review model
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
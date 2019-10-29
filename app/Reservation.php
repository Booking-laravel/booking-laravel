<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //

    protected $fillable = [
        'booking_start_at', 'booking_end_at', 'car_id', 'renter_id', 'is_booking'
    ];

    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function renter(){
        return $this->belongsTo('App\Renter');
    }
}

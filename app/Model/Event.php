<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'image', 'date', 'room_name', 'price', 'capacity', 'description', 'available', 'status'];


    public function event_bookings()
    {
        return $this->hasMany('App\Model\EventBooking');
    }

}

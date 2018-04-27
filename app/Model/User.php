<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'password', 'gender', 'date_of_birth', 'email', 'address', 'avatar', 'about', 'facebook_id', 'twitter_id', 'google_id', 'status'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function room_bookings()
    {
        return $this->hasMany('App\Model\RoomBooking');
    }

    public function event_bookings()
    {
        return $this->hasMany('App\Model\EventBooking');
    }
}

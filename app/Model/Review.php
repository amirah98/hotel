<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reviews';

    protected $fillable = ['review', 'rating', 'approval_status', 'room_booking_id'];

    public function room_booking(){

        return $this->belongsTo('App\Model\RoomBooking');
    }

}

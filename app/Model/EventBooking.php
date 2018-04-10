<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    /**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = 'event_bookings';

    protected $fillable = ['number_of_tickets', 'total_cost', 'status', 'payment', 'event_id', 'user_id'];

    /**
     * Get the gallery that owns the image.
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    /**
     * Get the gallery that owns the image.
     */
    public function event()
    {
        return $this->belongsTo('App\Model\Event');
    }
}

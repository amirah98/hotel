<?php

namespace App\Rules;

use App\Algo\Booking;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class RoomAvailableRule implements Rule
{
    protected $room_type;
    protected $new_arrival_date;
    protected $new_departure_date;
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($room_type, $new_arrival_date, $new_departure_date)
    {
        $this->room_type = $room_type;
        $this->new_arrival_date = $new_arrival_date;
        $this->new_departure_date = $new_departure_date;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->room_available();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, no rooms are available in the given dates. Please try another date.';
    }

    public function room_available()
    {
        $booking = new Booking($this->room_type, $this->new_arrival_date, $this->new_departure_date);
        return $booking->room_available();
    }


}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class RoomAvailableRule implements Rule
{
    protected $room_type;
    protected $request;
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($room_type, $request)
    {
        $this->room_type = $room_type;
        $this->request = $request;
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

    protected function room_available()
    {
        $this->rooms_exist();
        foreach ($this->room_type->rooms as $room) {
            $this->room_bookings_exist($room);
            foreach ($room->room_bookings as $room_booking) {
                $old_arrival_date = Carbon::parse($room_booking->arrival_date)->format('Y/m/d');
                $old_departure_date = Carbon::parse($room_booking->departure_date)->format('Y/m/d');
                $new_arrival_date = $this->request->input('arrival_date');
                $new_departure_date = $this->request->input('departure_date');

                if ($new_arrival_date > $old_arrival_date) {
                    if ($new_arrival_date >= $old_departure_date)
                        return true;
                } elseif ($new_arrival_date < $old_arrival_date) {
                    if ($new_departure_date <= $old_arrival_date)
                        return true;
                } else {
                    return false;
                }
            }
        }
    }

    protected function rooms_exist()
    {
        if (count($this->room_type->rooms) > 0) {
            return true;
        }
        $this->message = "Sorry, there are no room of given type available.";
        return false;
    }

    protected function room_bookings_exist($room)
    {
        if (count($room->room_bookings) > 0) {
            return true;
        }
    }

}

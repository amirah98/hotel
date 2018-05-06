@component('mail::message')

    The event has been recently booked.
    Please visit the following link to check your recent bookings.
    @component('mail::button', ['url' => url('/dashboard/event/booking')])
        Visit
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

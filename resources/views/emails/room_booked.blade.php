@component('mail::message')

    The room has been recently booked.
    Please visit the following link to check your recent bookings.
    @component('mail::button', ['url' => url('/dashboard/room/booking')])
        Visit
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent

@component('mail::message')

    The room has been recently booked.
    Please visit the following link to check your recent bookings.
    @component('mail::button', ['url' => ''])
        Visit
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

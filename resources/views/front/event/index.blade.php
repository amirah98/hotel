@extends('layouts.front')

@section('content')
    <div class="inn-body-section pad-bot-55">
        <div class="container">
            <div class="row">
                <div class="page-head">
                    <h2>All Hotel Events</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Events being hosted in our hotel are listed below.</p>
                </div>
                <!--TYPOGRAPHY SECTION-->
                @if(count($events) > 0)
                    <div class="col-md-12">
                        <div class="head-typo typo-com">
                            <h2>Upcoming Events</h2>
                            <p>All future events being hosted in our hotel</p>
                            @foreach($events as $event)
                            @continue($event->date < today()->format('Y-m-d'))
                            <!--EVENT-->
                            <div class="row events">
                                <div class="col-md-2"> <img src="{{ ('storage/events/'. $event->image) }}" alt="" /> </div>
                                <div class="col-md-8">
                                    <h3>{{ $event->name }}</h3> <span>Date: {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span>
                                    <p>{{ $event->description }}</p>
                                </div>
                                <div class="col-md-2"> <a href="#" class="waves-effect waves-light event-regi">Register</a> </div>
                            </div>
                            <!--END EVENT-->
                             @endforeach
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="head-typo typo-com">
                            <h2>Past Events</h2>
                            <p>All past events hosted in our hotel</p>
                            @foreach($events as $event)
                            @continue($event->date > today()->format('Y-m-d') || $event->date == today()->format('Y-m-d'))
                            <!--EVENT-->
                                <div class="row events">
                                    <div class="col-md-2"> <img src="{{ ('storage/events/'. $event->image) }}" alt="" /> </div>
                                    <div class="col-md-8">
                                        <h3>{{ $event->name }}</h3> <span>Date: {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span>
                                        <p>{{ $event->description }}</p>
                                    </div>
                                    <div class="col-md-2"> <a href="#" class="waves-effect waves-light event-regi">Register</a> </div>
                                </div>
                                <!--END EVENT-->
                            @endforeach
                        </div>
                    </div>
                @else

                    <h3>No Events are currently being hosted in our hotel.</h3>
                @endif
                <!--END TYPOGRAPHY SECTION-->
            </div>
        </div>
    </div>
@endsection

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
                            {!! Form::open(array('url' => 'event/'.$event->id.'/book', 'class' => 'col s12')) !!}
                            {{ Form::hidden('_method', 'POST') }}
                            @csrf
                            @continue($event->date < today()->format('Y-m-d'))
                            <!--EVENT-->

                            <div class="row events">

                                @if ($errors->has('number_of_tickets'))
                                    <div class="col-md-12 alert alert-danger">
                                        <strong>Sorry!</strong> {{ $errors->first('number_of_tickets') }}
                                    </div>
                                @endif
                                <div class="col-md-2"> <img src="{{ ('storage/events/'. $event->image) }}" alt="" /> </div>
                                <div class="col-md-8">
                                    <h3>{{ $event->name }}</h3> <span><strong>Date: </strong> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span>
                                    <p><strong>Price: </strong>Rs. {{ $event->price }}</p>
                                    <p>{{ $event->description }}</p>
                                </div>
                                <div class="col-md-2"> <span style="font-weight: bold">Number of tickets</span> </div>
                                <div class="input-field col-md-2">
                                   <input style="margin-bottom: 10px; height: 40px;" type="text" name="number_of_tickets">
                                </div>
                                <div class="col-md-2"> <input id="register-button" type="submit" value="Register" class="waves-effect waves-light event-regi"> </div>

                            </div>
                            <!--END EVENT-->
                            {!! Form::close() !!}
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
                                        <h3>{{ $event->name }}</h3> <span><strong>Date: </strong> {{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span>
                                        <p><strong>Price: </strong>Rs. {{ $event->price }}</p>
                                        <p>{{ $event->description }}</p>
                                    </div>
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

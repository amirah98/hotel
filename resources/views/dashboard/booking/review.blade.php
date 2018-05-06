@extends('layouts.dashboard')

@section('content')
    <div class="db-profile-view">
        <table>
            <thead>
            <tr>
                <th>Room Number</th>
                <th>Room</th>
                <th>Arrived Date</th>
                <th>Booking Status</th>
                <th>Review Approval Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $room_booking->room->room_number }}</td>
                <td>{{ $room_booking->room->room_type->name }}</td>
                <td>{{ \Carbon\Carbon::parse($room_booking->arrival_date)->diffForHumans() }}</td>
                <td>
                    @if($room_booking->status == "checked_in")
                        Checked In
                    @elseif($room_booking->status == "checked_out")
                        Checked Out
                    @elseif($room_booking->status == "cancelled")
                        Cancelled
                    @endif
                </td>
                <td>
                    @if(isset($room_booking->review->approval_status))
                        @if($room_booking->review->approval_status == "pending")
                            <span class="label label-default">Pending</span>
                        @elseif($room_booking->review->approval_status == "approved")
                            <span class="label label-success">Approved</span>
                        @elseif($room_booking->review->approval_status == "rejected")
                            <span class="label label-danger">Rejected</span>
                        @else
                            <span class="label label-default">Not reviewed yet</span>
                        @endif
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="db-profile-edit">
        {!! Form::open(array('url' => 'dashboard/room/booking/'.$room_booking->id.'/review/', 'id' => 'ratingsForm', 'class' => 'col s12')) !!}
        {{ Form::hidden('_method', 'POST') }}
        {{ csrf_field() }}
        <div>
            <label class="col s4">Review</label>
            <div class="input-field col s8">
                <textarea name="review"
                          class="review-textarea validate">@if($room_booking->review()->exists()){{ $room_booking->review->review }}@endif</textarea>
            </div>
        </div>
        <div>
            <label class="col s4">Rating</label>
            <div class="input-field col s8">
                <div class="stars">
                    <input type="radio" name="rating" value="1" class="star-1" id="star-1"
                    @if($room_booking->review()->exists())
                        @if($room_booking->review->rating == 1)
                            checked="checked"
                        @endif
                    @endif
                    />
                    <label class="star-1" for="star-1">1</label>
                    <input type="radio" name="rating" value="2"  class="star-2" id="star-2"
                           @if($room_booking->review()->exists())
                           @if($room_booking->review->rating == 2)
                           checked="checked"
                            @endif
                            @endif
                    />
                    <label class="star-2" for="star-2">2</label>
                    <input type="radio" name="rating" value="3"  class="star-3" id="star-3"
                           @if($room_booking->review()->exists())
                           @if($room_booking->review->rating == 3)
                           checked="checked"
                            @endif
                            @endif
                    />
                    <label class="star-3" for="star-3">3</label>
                    <input type="radio" name="rating" value="4"  class="star-4" id="star-4"
                           @if($room_booking->review()->exists())
                           @if($room_booking->review->rating == 4)
                           checked="checked"
                            @endif
                            @endif
                    />
                    <label class="star-4" for="star-4">4</label>
                    <input type="radio" name="rating" value="5"  class="star-5" id="star-5"
                           @if($room_booking->review()->exists())
                           @if($room_booking->review->rating == 5)
                           checked="checked"
                            @endif
                            @endif
                    />
                    <label class="star-5" for="star-5">5</label> <span></span> </div>
            </div>
        </div>
        <div>
            <div class="input-field col s8">
                <input type="submit" value="Update Review" class="waves-effect waves-light pro-sub-btn"
                       id="pro-sub-btn">
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

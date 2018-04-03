@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Hotel</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/hotel/'.$hotel->id, 'id' => 'hotel-add-form')) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name
                                            <star>*</star>
                                        </label>
                                        <input type="text" name="name" class="form-control border-input"
                                               placeholder="Ex: Hotel Yak and Yeti" value="{{ $hotel->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone
                                            <star>*</star>
                                        </label>
                                        <input type="text" name="phone" class="form-control border-input"
                                               placeholder="Ex: 9842100000" value="{{ $hotel->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cost Per Day<star>*</star></label>
                                        <input type="text" name="cost_per_day" class="form-control border-input"
                                               placeholder="Ex: 500" value="{{ $hotel->cost_per_day }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alternate Phone</label>
                                        <input type="text" name="alt_phone" class="form-control border-input"
                                               placeholder="Ex: 9842100000" value="{{ $hotel->alt_phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control border-input"
                                               placeholder="Ex: joe@example.com" value="{{ $hotel->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Destination
                                        </label>
                                        <select class="form-control" name="destination">
                                            <option value="">--Select Destination--</option>
                                            @forelse($destinations as $destination)
                                                <option value="{{$destination->id}}" @if($hotel->destination->id == $destination->id) selected="selected" @endif>{{$destination->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" rows="5" class="form-control border-input"
                                                  placeholder="Ex: Kamalpokhari, kathmandu.">{{ $hotel->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="control-label">
                                            Location on Map
                                            <star>*</star>
                                        </label>
                                    </div>

                                    <div class="col-md-6">
                                        <input id="address" class="form-control"
                                               type="text"
                                               placeholder="ex: Pokhara"
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-wd  btn-default btn-fill btn-magnify"
                                                id="address_submit">Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="card">
                                        <div class="content">
                                            <div id="map" class="map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Latitude
                                        </label>
                                        <input class="form-control"
                                               type="text"
                                               id="latitude"
                                               name="latitude"
                                               placeholder="Updated after selecting hotel"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">
                                            Longitude
                                        </label>
                                        <input class="form-control"
                                               type="text"
                                               id="longitude"
                                               name="longitude"
                                               placeholder="Updated after selecting hotel"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Hotel</button>
                            </div>
                            <div class="clearfix"></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!--  Forms Validations Plugin -->
    <script src="{{asset("backend/js/jquery.validate.min.js")}}"></script>

    <!-- Google Maps JS API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJX92Lnnn0OJpIHTkxCCDCoPzLno0cZcc"></script>
    <!-- GMaps Library -->
    <script src="{{asset("js/gmaps.min.js")}}"></script>

    <script src="{{ asset('js/map.js') }}"></script>
    <script>
        map.initGeoCodeGoogleMaps();
    </script>

    <script>
        $().ready(function () {

            var $validator = $("#hotel-add-form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    phone: {
                        required: true,
                        maxlength: 15
                    },
                    cost_per_day: {
                        required: true
                    },
                    alt_phone: {
                        maxlength: 15
                    },
                    email: {
                        email: true,
                        maxlength: 40
                    },
                    address: {
                        maxlength: 200
                    }
                }
            });
        });
    </script>
@endsection


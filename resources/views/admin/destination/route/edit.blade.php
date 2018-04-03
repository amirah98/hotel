@extends('layouts.admin')
@section('styles')
    @parent
    <link href="{{asset('backend/css/chosen.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card card-wizard" id="wizardCard">
                        {!! Form::open(array('id' => 'wizardForm', 'url' => 'admin/destination/'.$destination->id.'/route/'.$route->id)) !!}
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" id="action" value="edit"/>
                        <div class="header text-center">
                            <h4 class="title">Route Edit Wizard</h4>
                            <p class="category">Select Form and To</p>
                        </div>
                        <div class="content">
                            <ul class="nav">
                                <li><a href="#tab1" data-toggle="tab">Route</a></li>
                                <li><a href="#tab2" data-toggle="tab">Iteration</a></li>
                                <li><a href="#tab3" data-toggle="tab">Hotel</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="tab1">
                                    <h5 class="text-center">Select or Search location from map.</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label">
                                                        Address
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
                                                    <button class="btn btn-xs btn-default btn-fill btn-magnify pull-right"
                                                            id="map_clear">Clear Map
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="content">
                                                        <div id="route-map" class="map"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        From
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="from"
                                                           name="from_name"
                                                           placeholder="Enter Origin Name"
                                                           value="{{ $route->from_name }}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Latitude
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="from_latitude"
                                                           name="from_latitude"
                                                           placeholder="Updated after selecting destination"
                                                           value="{{ $route->from_latitude }}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Longitude
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="from_longitude"
                                                           name="from_longitude"
                                                           placeholder="Updated after selecting destination"
                                                           value="{{ $route->from_longitude }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        To
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="to"
                                                           name="to_name"
                                                           placeholder="Enter Destination Name"
                                                           value="{{ $route->to_name }}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Latitude
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="to_latitude"
                                                           name="to_latitude"
                                                           placeholder="Updated after selecting destination"
                                                           value="{{ $route->to_latitude }}"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Longitude
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="to_longitude"
                                                           name="to_longitude"
                                                           placeholder="Updated after selecting destination"
                                                           value="{{ $route->to_longitude }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane" id="tab2">
                                    <h5 class="text-center">Add Travel Details.</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <button id="add_route_detail" type="button" rel="tooltip" title=""
                                                    class="btn btn-danger" style="margin-right: 20px"
                                                    data-original-title="Add Travel Options">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @forelse($route->travel_mediums as $route_detail)
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="header">
                                                <h4 class="title">Travel Option {{$loop->iteration}}</h4>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Travel Medium
                                                        <star>*</star>
                                                    </label>
                                                    <select class="form-control" name="travel_medium[{{$loop->index}}][name]">
                                                        <option value="">--Select Travel Medium--</option>
                                                        @forelse($travel_mediums as $travel_medium)
                                                            <option value="{{$travel_medium->id}}" @if($route_detail->id == $travel_medium->id) selected="selected" @endif>{{$travel_medium->name}}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Est. Travel Time (Hours)
                                                        <star>*</star>
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="travel_medium[{{$loop->index}}][travel_time]"
                                                           placeholder="Ex: 5"
                                                           value="{{$route_detail->pivot->travel_time + 0}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Est. Travel Cost
                                                        <star>*</star>
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="travel_medium[{{$loop->index}}][travel_cost]"
                                                           placeholder="Ex: 5000"
                                                           value="{{$route_detail->pivot->travel_cost + 0}}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Difficulty
                                                    </label>
                                                    <select class="form-control" name="travel_medium[{{$loop->index}}][difficulty]">
                                                        <option value="">--Select Difficulty--</option>
                                                        <option value="normal" @if($route_detail->pivot->difficulty == "normal") selected="selected" @endif>Normal</option>
                                                        <option value="hard" @if($route_detail->pivot->difficulty == "hard") selected="selected" @endif>Hard</option>
                                                        <option value="extreme" @if($route_detail->pivot->difficulty == "extreme") selected="selected" @endif>Extreme</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Description
                                                    </label>
                                                    <textarea rows="3" class="form-control"
                                                              name="travel_medium[{{$loop->index}}][description]">{{$route_detail->pivot->description}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                        @empty
                                    @endforelse

                                </div>
                                <div class="tab-pane" id="tab3">
                                    <h5 class="text-center">Skip this tab if hotel stay is not needed</h5>
                                    <p class=" category text-center">Select Hotel or Register New One</p>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Select Hotel
                                                    <star>*</star>
                                                </label>
                                                <select id="select-hotel" class="form-control chosen-select"
                                                        name="hotel_id">
                                                    <option value="0">Add New Hotel</option>
                                                    @forelse($destinations as $destination)
                                                        <optgroup label="{{$destination->name}}">
                                                        @forelse($destination->hotels as $hotel)
                                                                <option value="{{$hotel->id}}" @if($route->hotels()->first()->id == $hotel->id) selected="selected" @endif>{{$hotel->name}}</option>
                                                            @empty
                                                            @endforelse
                                                        </optgroup>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hotel_add_form" class="hide">
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <h6 class="text-center">Add New Hotel</h6>
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Hotel Name
                                                        <star>*</star>
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="hotel_name"
                                                           placeholder="ex: Hotel Samabala"
                                                           value="{{ old('hotel_name') }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Hotel Phone
                                                        <star>*</star>
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="hotel_phone"
                                                           placeholder="ex: 9842117589"
                                                           value="{{ old('hotel_phone') }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Cost Per Day
                                                        <star>*</star>
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="hotel_cost_per_day"
                                                           placeholder="ex: 855"
                                                           value="{{ old('hotel_cost_per_day') }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Alternate Phone
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="hotel_alt_phone"
                                                           placeholder="ex: 9842117589"
                                                           value="{{ old('hotel_alt_phone') }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Address
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="hotel_address"
                                                           placeholder="ex: Kapurdhara Chowk, Lainchour"
                                                           value="{{ old('hotel_address') }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Email
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="hotel_email"
                                                           placeholder="ex: joe@example.com"
                                                           value="{{ old('hotel_email') }}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hotel_select_description" class="hide">
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <p class="Text-center">The selected hotel details will be included in the route.</p>
                                                <p class="Text-center">If you rather want to add new hotel, select "Add New Hotel" from the options.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="z-index: 1 !important;">
                            <button type="button" class="btn btn-default btn-fill btn-wd btn-back pull-left">Back
                            </button>
                            <button type="button" class="btn btn-info btn-fill btn-wd btn-next pull-right">Next
                            </button>
                            <button type="submit" class="btn btn-info btn-fill btn-wd btn-finish pull-right">Submit
                            </button>
                            <div class="clearfix"></div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <script src="{{asset("backend/js/chosen.jquery.js")}}"></script>
    <!--  Forms Validations Plugin -->

    <script src="{{asset("backend/js/jquery.validate.min.js")}}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset("backend/js/moment.min.js")}}"></script>

    <!--  Select Picker Plugin -->
    <script src="{{asset("backend/js/bootstrap-selectpicker.js")}}"></script>

    <!--  Checkbox, Radio, Switch and Tags Input Plugins -->
    <script src="{{asset("backend/js/bootstrap-checkbox-radio-switch-tags.js")}}"></script>

    <!-- Wizard Plugin    -->
    <script src="{{asset("backend/js/jquery.bootstrap.wizard.min.js")}}"></script>

    <!-- Google Maps JS API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJX92Lnnn0OJpIHTkxCCDCoPzLno0cZcc"></script>
    <!-- GMaps Library -->
    <script src="{{asset("js/gmaps.min.js")}}"></script>

    <script src="{{ asset('js/map.js') }}"></script>

    <script>
        $().ready(function () {
            //Choosen jquery
            $(".chosen-select").chosen({max_selected_options: 5});

            $("#select-hotel").change(function (e) {
                var selected = $("#select-hotel").val();
                e.preventDefault();
                if (selected == "0") {
                    $("#hotel_add_form").removeClass("hide");
                    $("#hotel_select_description").addClass("hide");
                } else {
                    $("#hotel_add_form").addClass("hide");
                    $("#hotel_select_description").removeClass("hide");
                }
            });
            var i = parseInt('{{$route->travel_mediums->count()}}');
            $('#add_route_detail').click(function () {
                var travel_medium_row = "travel_medium[" + i + "]";
                $('#tab2').append('<div class="row">' +
                        '<div class="col-md-10 col-md-offset-1">' +
                        '<div class="header">' +
                        '<h4 class="title">Travel Option ' + (i + 1) + '</h4>' +
                        '</div>' +
                        '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label class="control-label">Travel Medium<star>*</star></label>' +
                        '<select class="form-control" name="' + travel_medium_row + '[name]">' +
                        '<option value="">--Select Travel Medium--</option>' +
                        @forelse($travel_mediums as $travel_medium)
                                '<option value="{{$travel_medium->id}}">{{$travel_medium->name}}</option>' +
                        @empty
                                @endforelse
                                '</select></div></div>' +
                        '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label class="control-label">Est. Travel Time (Hours)<star>*</star></label>' +
                        '<input class="form-control" type="text" name="' + travel_medium_row + '[travel_time]" placeholder="Ex: 5"/>' +
                        '</div></div>' +
                        '<div class="col-md-4">' +
                        '<div class="form-group">' +
                        '<label class="control-label">Est. Travel Cost<star>*</star></label>' +
                        '<input class="form-control" type="text" name="' + travel_medium_row + '[travel_cost]" placeholder="Ex: 5000"/>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="row">' +
                        '<div class="col-md-10 col-md-offset-1">' +
                        '<div class="col-md-12">' +
                        '<div class="form-group">' +
                        '<label class="control-label">Difficulty</label>' +
                        '<select class="form-control" name="' + travel_medium_row + '[difficulty]">' +
                        '<option value="">--Select Difficulty--</option>' +
                        '<option value="normal">Normal</option>' +
                        '<option value="hard">Hard</option>' +
                        '<option value="extreme">Extreme</option>' +
                        '</select>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        ' <div class="row">' +
                        '<div class="col-md-10 col-md-offset-1">' +
                        '<div class="col-md-12">' +
                        '<div class="form-group">' +
                        '<label class="control-label">Description</label>' +
                        '<textarea rows="3" class="form-control" name="' + travel_medium_row + '[description]"></textarea>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<hr>')
                i++;
            });

            var $validator = $("#wizardForm").validate({
                rules: {
                    from_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    to_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    from_latitude: {
                        required: true,
                        number: true
                    },
                    from_longitude: {
                        required: true,
                        number: true
                    },
                    to_latitude: {
                        required: true,
                        number: true
                    },
                    to_longitude: {
                        required: true,
                        number: true
                    }
                }
            });

            // you can also use the nav-pills-[blue | azure | green | orange | red] for a different color of wizard
            $('#wizardCard').bootstrapWizard({
                tabClass: 'nav nav-pills',
                nextSelector: '.btn-next',
                previousSelector: '.btn-back',
                onNext: function (tab, navigation, index) {
                    var $valid = $('#wizardForm').valid();

                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    }
                },
                onInit: function (tab, navigation, index) {

                    //check number of tabs and fill the entire row
                    var $total = navigation.find('li').length;
                    $width = 100 / $total;

                    $display_width = $(document).width();

                    if ($display_width < 600 && $total > 3) {
                        $width = 50;
                    }

                    navigation.find('li').css('width', $width + '%');
                },
                onTabClick: function (tab, navigation, index) {
                    // Disable the posibility to click on tabs
                    return true;
                },
                onTabShow: function (tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;

                    var wizard = navigation.closest('.card-wizard');

                    if ($current == 1) {
                        map.initRouteGoogleMaps();
                    }
                    // If it's the last tab then hide the last button and show the finish instead
                    if ($current >= $total) {
                        $(wizard).find('.btn-next').hide();
                        $(wizard).find('.btn-finish').show();
                    } else if ($current == 1) {
                        $(wizard).find('.btn-back').hide();
                    } else {
                        $(wizard).find('.btn-back').show();
                        $(wizard).find('.btn-next').show();
                        $(wizard).find('.btn-finish').hide();
                    }
                }
            });
        });
    </script>
@endsection


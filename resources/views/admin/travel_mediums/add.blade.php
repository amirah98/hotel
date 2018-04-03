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
                            <h4 class="title">Add Travel Medium</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/travel_medium/', 'id' => 'travel_medium-add-form')) !!}
                            {{ Form::hidden('_method', 'POST') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control border-input"
                                               placeholder="Ex: AC Night Bus" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Travel Mode</label>
                                        <select name="travel_mode" id="travel_mode" class="form-control">
                                            <option selected="" disabled="">- Select Travel Mode -</option>
                                            <option value="AIR"
                                                    @if (Input::old('travel_mode') == 'AIR ') selected="selected" @endif>
                                                AIR
                                            </option>
                                            <option value="DRIVING"
                                                    @if (Input::old('travel_mode') == 'DRIVING ') selected="selected" @endif>
                                                DRIVING
                                            </option>
                                            <option value="TRANSIT"
                                                    @if (Input::old('travel_mode') == 'TRANSIT') selected="selected" @endif>
                                                PUBLIC VEHICLE
                                            </option>
                                            <option value="BICYCLING"
                                                    @if (Input::old('travel_mode') == 'BICYCLING ') selected="selected" @endif>
                                                BICYCLING
                                            </option>
                                            <option value="WALKING"
                                                    @if (Input::old('travel_mode') == 'WALKING') selected="selected" @endif>
                                                WALKING
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" rows="5" class="form-control border-input"
                                                  placeholder="Ex: Comfortable while enjoying the view.">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Add Travel Medium
                                </button>
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

    <!--  Select Picker Plugin -->
    <script src="{{asset('backend/js/bootstrap-selectpicker.js')}}"></script>

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="{{asset("backend/js/moment.min.js")}}"></script>

    <!--  Date Time Picker Plugin is included in this js file -->
    <script src="{{asset('/backend/js/bootstrap-datetimepicker.js')}}"></script>
    <script>
        // Init DatetimePicker
        demo.initFormExtendedDatetimepickers();
    </script>

    <script>
        $().ready(function () {

            var $validator = $("#travel_medium-add-form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5,
                        maxlength: 50
                    },
                    description: {
                        maxlength: 200
                    },
                    gender: {
                        required: true
                    }
                }
            });
        });
    </script>
@endsection


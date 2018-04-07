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
                            <h4 class="title">Edit Food from Menu</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/food/'.$food->id, 'id' => 'food-add-form', 'files' => true)) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Food Name<star>*</star></label>
                                        <input type="text" name="name" class="form-control border-input" value="{{ $food->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Type<star>*</star></label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="Appetizer"
                                                    @if ($food->type == 'Appetizer') selected="selected" @endif>Appetizer
                                            </option>
                                            <option value="Soup"
                                                    @if ($food->type == 'Soup') selected="selected" @endif>Soup
                                            </option>
                                            <option value="Salad"
                                                    @if ($food->type == 'Salad') selected="selected" @endif>Salad
                                            </option>
                                            <option value="Main Course"
                                                    @if ($food->type == 'Main Course') selected="selected" @endif>Main Course
                                            </option>
                                            <option value="Dessert"
                                                    @if ($food->type == 'Dessert') selected="selected" @endif>Dessert
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <img height="70px" width="70px" src="{{'/storage/foods/'.$food->image}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image<star>*</star></label>
                                        <input type="file" name="image" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Price<star>*</star></label>
                                        <input type="text" name="price" class="form-control border-input"
                                               placeholder="Ex: 500" value="{{ $food->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" rows="5" class="form-control border-input"
                                                  placeholder="Ex: The Royal Suite are the luxurious hotel rooms you can book.">{{ $food->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                    @if ($food->status == '1') selected="selected" @endif>Active
                                            </option>
                                            <option value="0"
                                                    @if ($food->status == '0') selected="selected" @endif>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Food Menu</button>
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

            var $validator = $("#food-add-form").validate({
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


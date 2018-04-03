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
                            <h4 class="title">Update Slider Image</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/slider/'.$image->id, 'files' => true)) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-12" align="center">
                                    <img height="250px" width="600px" src="{{'/storage/slider/'.$image->name}}"/>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control border-input"
                                               placeholder="Ex: Talbarahi Mandir" value="{{ $image->title  }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" rows="5" class="form-control border-input"
                                                  placeholder="Ex: Talbarahi is located in Pokhara.">{{ $image->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="link" class="form-control border-input"
                                               placeholder="ex: Link" value="{{ $image->link }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1"
                                                    @if ($image->status == '1') selected="selected" @endif>Active
                                            </option>
                                            <option value="0"
                                                    @if ($image->status == '0') selected="selected" @endif>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Slider Image</button>
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
@endsection


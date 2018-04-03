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
                            <h4 class="title">Change Password</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(array('url' => 'admin/user/'.Auth::user()->id.'/setting', 'files' => true, 'id'=>'passwordValidation')) !!}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control"
                                               name="password"
                                               id="registerPassword"
                                               type="password"
                                               required="true"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control"
                                               name="password_confirmation"
                                               id="registerPasswordConfirmation"
                                               type="password"
                                               required="true"
                                               equalTo="#registerPassword"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
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
<script>
    $().ready(function(){
        $('#passwordValidation').validate();
    });
</script>
@endsection


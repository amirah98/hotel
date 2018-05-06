@extends('layouts.dashboard')

@section('content')
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3>Edit Profile</h3>
                <p>Update your profile details using this form.</p>
            </div>
            <div class="book-form inn-com-form db-form">

                {!! Form::open(array('url' => 'dashboard/profile/', 'class' => 'col s12', 'files' => true)) !!}
                {{ Form::hidden('_method', 'PUT') }}
                @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="first_name" type="text"
                                   class="validate {{ $errors->has('first_name') ? ' invalid' : '' }}" value="{{ $user->first_name }}" required autofocus>
                            <label>First Name</label>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input name="last_name" type="text"
                                   class="validate {{ $errors->has('last_name') ? ' invalid' : '' }}" value="{{ $user->last_name }}" required>
                            <label>Last Name</label>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="gender">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male" @if($user->gender == "male") selected="selected"@endif>Male
                                </option>
                                <option value="female" @if($user->gender == "female") selected="selected"@endif>Female
                                </option>
                                <option value="others" @if($user->gender == "others") selected="selected"@endif>Others
                                </option>
                            </select>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="input-field col s6">
                            <input name="phone" type="text"
                                   class="validate {{ $errors->has('phone') ? ' invalid' : '' }}" value="{{ $user->phone }}">
                            <label>Phone</label>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="address" type="text"
                                   class="validate {{ $errors->has('address') ? ' invalid' : '' }}" value="{{ $user->address }}">
                            <label>Address</label>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <span>Profile Picture:</span>
                            <input name="avatar" type="file"
                                   class="validate {{ $errors->has('avatar') ? ' invalid' : '' }}" value="{{ $user->avatar }}">

                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="email" type="email"
                                   class="validate {{ $errors->has('email') ? ' invalid' : '' }}" value="{{ $user->email }}" required>
                            <label>Email Address</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="about" id="textarea" class="materialize-textarea" data-length="300">{{ $user->about }}</textarea>
                            <label class="">About Me</label>
                            <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
                            @if ($errors->has('about'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="row">
                        <div class="input-field col s12">
                            <input type="submit" value="submit" class="form-btn"> </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

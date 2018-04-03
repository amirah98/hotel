@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card card-wizard" id="wizardCard">
                        {!! Form::open(array('id' => 'wizardForm', 'url' => 'admin/destination/'.$destination->id, 'files' => true)) !!}
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ csrf_field() }}
                        <div class="header text-center">
                            <h4 class="title">Destination Edit Wizard</h4>
                            <p class="category">Edit Travel Destination</p>
                        </div>
                        <div class="content">
                            <ul class="nav">
                                <li><a href="#tab1" data-toggle="tab">Information</a></li>
                                <li><a href="#tab2" data-toggle="tab">Location</a></li>
                                {{--<li><a href="#tab3" data-toggle="tab">Routes</a></li>--}}
                                <li><a href="#tab3" data-toggle="tab">Gallery</a></li>
                            </ul>
                            <div class="tab-content">

                                <div class="tab-pane" id="tab1">
                                    <h5 class="text-center">Please provide information about destination you want to
                                        add.</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Destination Name
                                                    <star>*</star>
                                                </label>
                                                <input class="form-control"
                                                       type="text"
                                                       name="name"
                                                       placeholder="ex: Pokhara"
                                                       value="{{ $destination->name }}"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Zone
                                                    <star>*</star>
                                                </label>
                                                <select name="zone" id="zone" class="form-control">
                                                    <option value="{{$destination->zone}}" selected="selected">{{$destination->zone}}</option>
                                                    <option vlaue="">- Select Zone -</option>
                                                    <option value="Mechi">Mechi</option>
                                                    <option value="Koshi">Koshi</option>
                                                    <option value="Sagarmatha">Sagarmatha</option>
                                                    <option value="Janakpur">Janakpur</option>
                                                    <option value="Bagmati">Bagmati</option>
                                                    <option value="Narayani">Narayani</option>
                                                    <option value="Gandaki">Gandaki</option>
                                                    <option value="Lumbini">Lumbini</option>
                                                    <option value="Dhawalagiri">Dhawalagiri</option>
                                                    <option value="Rapti">Rapti</option>
                                                    <option value="Karnali">Karnali</option>
                                                    <option value="Bheri">Bheri</option>
                                                    <option value="Seti">Seti</option>
                                                    <option value="Mahakali">Mahakali</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    District
                                                    <star>*</star>
                                                </label>
                                                <select class="form-control" name="district" id="district">
                                                    <option value="{{$destination->district}}" selected="selected">{{$destination->district}}</option>
                                                    <option value="">--Select District--</option>
                                                    <optgroup label="Mechi">
                                                        <option value="Taplejung">Taplejung</option>
                                                        <option value="Panchthar">Panchthar</option>
                                                        <option value="Ilam">Ilam</option>
                                                        <option value="Jhapa">Jhapa</option>
                                                    </optgroup>
                                                    <optgroup label="Koshi">
                                                        <option value="Morang">Morang</option>
                                                        <option value="Sunsari">Sunsari</option>
                                                        <option value="Dhankutta">Dhankutta</option>
                                                        <option value="Sankhuwasabha">Sankhuwasabha</option>
                                                        <option value="Bhojpur">Bhojpur</option>
                                                        <option value="Terhathum">Terhathum</option>
                                                    </optgroup>
                                                    <optgroup label="Sagarmatha">
                                                        <option value="Okhaldunga">Okhaldunga</option>
                                                        <option value="Khotang">Khotang</option>
                                                        <option value="Solukhumbu">Solukhumbu</option>
                                                        <option value="Udaypur">Udaypur</option>
                                                        <option value="Saptari">Saptari</option>
                                                        <option value="Siraha">Siraha</option>
                                                    </optgroup>
                                                    <optgroup label="Janakpur">
                                                        <option value="Dhanusa">Dhanusa</option>
                                                        <option value="Mahottari">Mahottari</option>
                                                        <option value="Sarlahi">Sarlahi</option>
                                                        <option value="Sindhuli">Sindhuli</option>
                                                        <option value="Ramechhap">Ramechhap</option>
                                                        <option value="Dolkha">Dolkha</option>
                                                    </optgroup>
                                                    <optgroup label="Bagmati">
                                                        <option value="Sindhupalchauk">Sindhupalchauk</option>
                                                        <option value="Kavreplanchauk">Kavreplanchauk</option>
                                                        <option value="Lalitpur">Lalitpur</option>
                                                        <option value="Bhaktapur">Bhaktapur</option>
                                                        <option value="Kathmandu">Kathmandu</option>
                                                        <option value="Nuwakot">Nuwakot</option>
                                                        <option value="Rasuwa">Rasuwa</option>
                                                        <option value="Dhading">Dhading</option>
                                                    </optgroup>
                                                    <optgroup label="Narayani">
                                                        <option value="Makwanpur">Makwanpur</option>
                                                        <option value="Rauthat">Rauthat</option>
                                                        <option value="Bara">Bara</option>
                                                        <option value="Parsa">Parsa</option>
                                                        <option value="Chitwan">Chitwan</option>
                                                    </optgroup>
                                                    <optgroup label="Gandaki">
                                                        <option value="Gorkha">Gorkha</option>
                                                        <option value="Lamjung">Lamjung</option>
                                                        <option value="Tanahun">Tanahun</option>
                                                        <option value="Tanahun">Tanahun</option>
                                                        <option value="Syangja">Syangja</option>
                                                        <option value="Kaski">Kaski</option>
                                                        <option value="Manag">Manag</option>
                                                    </optgroup>
                                                    <optgroup label="Dhawalagiri">
                                                        <option value="Mustang">Mustang</option>
                                                        <option value="Parwat">Parwat</option>
                                                        <option value="Myagdi">Myagdi</option>
                                                        <option value="Myagdi">Myagdi</option>
                                                        <option value="Baglung">Baglung</option>
                                                    </optgroup>
                                                    <optgroup label="Lumbini">
                                                        <option value="Gulmi">Gulmi</option>
                                                        <option value="Palpa">Palpa</option>
                                                        <option value="Nawalparasi">Nawalparasi</option>
                                                        <option value="Rupandehi">Rupandehi</option>
                                                        <option value="Arghakhanchi">Arghakhanchi</option>
                                                        <option value="Kapilvastu">Kapilvastu</option>
                                                    </optgroup>
                                                    <optgroup label="Rapti">
                                                        <option value="Pyuthan">Pyuthan</option>
                                                        <option value="Rolpa">Rolpa</option>
                                                        <option value="Rukum">Rukum</option>
                                                        <option value="Salyan">Salyan</option>
                                                        <option value="Dang">Dang</option>
                                                    </optgroup>
                                                    <optgroup label="Bheri">
                                                        <option value="Bardiya">Bardiya</option>
                                                        <option value="Surkhet">Surkhet</option>
                                                        <option value="Dailekh">Dailekh</option>
                                                        <option value="Banke">Banke</option>
                                                        <option value="Jajarkot">Jajarkot</option>
                                                    </optgroup>
                                                    <optgroup label="Karnali">
                                                        <option value="Dolpa">Dolpa</option>
                                                        <option value="Humla">Humla</option>
                                                        <option value="Kalikot">Kalikot</option>
                                                        <option value="Mugu">Mugu</option>
                                                        <option value="Jumla">Jumla</option>
                                                    </optgroup>
                                                    <optgroup label="Seti">
                                                        <option value="Bajura">Bajura</option>
                                                        <option value="Bajhang">Bajhang</option>
                                                        <option value="Achham">Achham</option>
                                                        <option value="Doti">Doti</option>
                                                        <option value="Kailali">Kailali</option>
                                                    </optgroup>
                                                    <optgroup label="Mahakali">
                                                        <option value="Kanchanpur">Kanchanpur</option>
                                                        <option value="Dadeldhura">Dadeldhura</option>
                                                        <option value="Baitadi">Baitadi</option>
                                                        <option value="Darchula">Darchula</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Description
                                                    <star>*</star>
                                                </label>
                                                <textarea name="description"
                                                          class="form-control"
                                                          placeholder="Destination Information"
                                                          rows="4"
                                                >{{ $destination->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    <h5 class="text-center">Select or Search destination from map.</h5>

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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <div class="card">
                                                    <div class="content">
                                                        <div id="map" class="map"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Latitude
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           id="latitude"
                                                           name="latitude"
                                                           placeholder="Updated after selecting destination"
                                                           value="{{$destination->latitude}}"
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
                                                           placeholder="Updated after selecting destination"
                                                           value="{{$destination->longitude}}"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="tab-pane" id="tab3">
                                    <h5 class="text-center">Select routes and their details to the destination.</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Select Route
                                                    <star>*</star>
                                                </label>

                                                <div class="card">
                                                    <div class="content">
                                                        <div id="map1" class="map"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Transport Medium
                                                        <star>*</star>
                                                    </label>
                                                    <select name="transport_medium" class="form-control">
                                                        <option selected="" disabled="">- Select Transport Medium
                                                            -
                                                        </option>
                                                        <option value="ms">Aeroplane</option>
                                                        <option value="ca">Tourist Bus</option>
                                                        <option value="da">Car</option>
                                                        <option value="de">Motorbike</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">
                                                        Estimated Travel Time
                                                        <star>*</star>
                                                    </label>
                                                    <input class="form-control"
                                                           type="text"
                                                           name="travel_time"
                                                           placeholder="ex: 5"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="btn-group pull-right">
                                            <button type="button" class="btn btn-icon btn-xs"><i class="ti-plus"
                                                                                                 aria-hidden="true"></i>Add
                                                Medium
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="button"
                                                class="btn btn-wd btn-default btn-fill btn-move-right">
                                            Add New Route
                                            <span class="btn-label">
                                                <i class="ti-angle-right"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>--}}
                                <div class="tab-pane" id="tab3">
                                    <h5 class="text-center">Add new photos.</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Images
                                                </label>
                                                <input class="form-control"
                                                       type="file"
                                                       name="photos[]"
                                                       placeholder="Upload Images"
                                                       multiple
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
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
    <script src="{{asset("js/gmaps.js")}}"></script>

    <script src="{{ asset('js/map.js') }}"></script>

    <script>
        $().ready(function () {

            var $validator = $("#wizardForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    description: {
                        required: true,
                        minlength: 10
                    },
                    zone: {
                        required: true
                    },
                    district: {
                        required: true
                    },
                    latitude: {
                        required: true
                    },
                    longitude: {
                        required: true
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

                    if ($current == 2) {
                        map.initGeoCodeGoogleMaps(lat= '{{$destination->latitude}}', lng= '{{$destination->longitude}}');
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


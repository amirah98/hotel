@extends('layouts.admin')
@section('style')
    @parent
{{--
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('backend/css/demo.css') }}" rel="stylesheet" />--}}
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-muted text-center">Welcome to {{ config('app.name') }} Dashboard</h2>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <!-- Circle Percentage-chart -->
    <script src="{{ asset('backend/js/jquery.easypiechart.min.js') }}"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('backend/js/chartist.min.js') }}"></script>

    <!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
    <script src="{{ asset('backend/js/demo.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            demo.initOverviewDashboard();
            demo.initCirclePercentage();

        });
    </script>
@endsection


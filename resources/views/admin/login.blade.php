<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('backend/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('backend/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ config('app.name', 'Laravel') }} - Sign In</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('backend/css/paper-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('backend/css/demo.css')}}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/font-muli.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{asset('backend/css/themify-icons.css')}}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../front/dashboard/overview.html">{{ config('app.name', 'Laravel') }}</a>
        </div>
    </div>
</nav>

<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" data-color="" data-image="{{asset('backend/img/background/background-2.jpg')}}">
        <!--   you can change the color of the filter page using: data-color="blue | azure | green | orange | red | purple" -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card" data-background="color" data-color="blue">
                                <div class="header">
                                    <h3 class="title">Login</h3>
                                </div>
                                <div class="content">
                                    <div class="form-group">
                                        <a href="{{ url('/social/auth/redirect', ['twitter']) }}" class="btn btn-sm btn-fill btn-twitter">Log in with Twitter</a>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ url('/social/auth/redirect', ['google']) }}" class="btn btn-sm btn-fill btn-google">Log in with Google</a>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" value="{{ old('email') }}" placeholder="Enter email" class="form-control input-no-border {{ $errors->has('email') ? ' error' : '' }}">
                                        @if ($errors->has('email'))
                                            <strong><label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label></strong>
                                        @endif

                                         </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" class="form-control input-no-border  {{ $errors->has('password') ? ' error' : '' }}">
                                        @if ($errors->has('password'))
                                            <strong><label id="password-error" class="error" for="password">{{ $errors->first('password') }}</label></strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-fill btn-wd ">Let's go</button>
                                    <div class="forgot">
                                        <a href="#pablo">Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <footer class="footer footer-transparent">
            <div class="container">
                <div class="copyright">
                    &copy; <script>document.write(new Date().getFullYear())</script>, {{ config('app.name', 'Laravel') }}</a>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>

<!--   Core JS Files. Extra: PerfectScrollbar + TouchPunch libraries inside jquery-ui.min.js   -->
<script src="{{asset('backend/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/js/bootstrap.min.js')}}" type="text/javascript"></script>


<!--  Forms Validations Plugin -->
<script src="{{asset('backend/js/jquery.validate.min.js')}}" type="text/javascript"></script>

<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
<script src="{{asset('backend/js/demo.js')}}"></script>

<script type="text/javascript">
    $().ready(function(){
        demo.checkFullPageBackgroundImage();

        setTimeout(function(){
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>


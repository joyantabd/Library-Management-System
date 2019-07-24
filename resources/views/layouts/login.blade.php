<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!---Styles For Login Page-->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/login/css/main.css')}}">
</head>
<body>
<div class="wrapper">



    @yield('content')


</div>
<!---Login Page Javascript--->
<script src="{{asset('backend/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('backend/login/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('backend/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/login/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('backend/login/vendor/tilt/tilt.jquery.min.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<script src="{{asset('backend/login/js/main.js')}}"></script>
@stack('scripts')
</body>
</html>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Утасны жагсаалт</title>

    <!-- Scripts -->
    {{-- <script src="{{ url('public/js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    <link href="{{ url('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/contact_styles.css') }}" rel="stylesheet">


    <!--Zagvarlag alert-->
    <link rel="stylesheet" href="{{ asset('public/z-alert/css/alertify.core.css') }}" />
	  <link rel="stylesheet" href="{{ asset('public/z-alert/css/alertify.default.css') }}" />
    <script src="{{ asset('public/z-alert/js/alertify.min.js') }}"></script>
    <!--Zagvarlag alert-->

    <script src="{{url('public/vendors/jquery/dist/jquery.min.js')}}"></script>
</head>
<body>
    <div class="header">
      <img class="img-fluid" with="120" src="{{url("public/images/header.jpg")}}" />
    </div>
    <main class="main">
      @yield('content')


    </main>
    <!-- Bootstrap -->
        <script src="{{url('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>

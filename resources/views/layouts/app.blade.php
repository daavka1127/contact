<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Нэвтрэх хэсэг</title>

    <!-- Scripts -->
    <script src="{{ url('public/js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ url('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

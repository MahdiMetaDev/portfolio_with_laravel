<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/homestyle.css') }}">

    <!-- ===== BOX ICONS ===== -->
    <link href='{{ asset('assets/css/boxicons.min.css') }}' rel='stylesheet'>

    <title>
        @yield('title')
    </title>

</head>

<body>

@include('web.layout.header')

@yield('content')

@include('web.layout.footer')

<!--===== SCROLL REVEAL =====-->
<script src="https://unpkg.com/scrollreveal"></script>

<!--===== MAIN JS =====-->
<script src="{{ asset('assets/js/main2.js') }}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kursus Online</title>
    {{-- <style>
        {!! Vite::content('resources/css/app.css') !!}
    </style> --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @stack('after-style')
</head>

<body class="w-full h-full flex flex-col">

    <div id="app" class="w-full h-full m-auto">
        @yield('content')
    </div>

    {{-- <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script> --}}
    @vite('resources/js/app.js')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @stack('after-script')
</body>

</html>

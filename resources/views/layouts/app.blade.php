@php
    use Illuminate\Support\Facades\Vite;
@endphp
<!DOCTYPE html>
<html lang="en">

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

<body class="min-h-screen flex flex-col">

    @include('layouts.header')

    <div id="app">
        @yield('content')
    </div>

    @include('layouts.footer')
    {{-- <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script> --}}
    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
    @stack('after-script')
</body>

</html>

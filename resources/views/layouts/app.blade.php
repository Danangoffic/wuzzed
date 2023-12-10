<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kursus Online</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 h-100 min-h-screen">

    @include('layouts.navbar')
    <div id="app">
        @yield('content')
    </div>


    @include('layouts.footer')

    @vite('resources/js/app.js')
</body>

</html>

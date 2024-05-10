<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exist Auto</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh; /* Ensure the body takes up at least the height of the viewport */
            position: relative; /* Needed for footer positioning */
        }
    </style>
</head>
<body>
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    @include('components.navbar')
    @yield('content') <!-- Content unique to each page -->
    {{-- <div class="container">
    </div> --}}
    {{-- @include('home') --}}
</body>
</html>

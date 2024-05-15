<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exist Auto</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
        }
        .main-content {
            display: flex;
            flex-direction: column;
            min-height: 80vh;
        }

        .delete-button-mycars {
            position: absolute;
            top: 0;
            right: 0;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-card-mycars {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
    </style>
</head>

<body>
    @if (session('success') == 'Please login first!')
        <script>
            window.onload = function() {
                $('#authModal').modal('show');
            }
        </script>
    @endif
    @include('components.navbar')
    @if (session('success'))
        <div class="alert alert-success alert-fixed" role="alert" id="customAlert">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-fixed" role="alert" id="customAlert">
            {{ session('error') }}
        </div>
    @endif
    @yield('content')
    @include('components.footer')
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script defer src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- MDB -->
    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    <script defer type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <title>{{ config('app.name') }}</title>
</head>

<body>
    @yield('nav')
    @yield('body')
    @yield('footer')
</body>

</html>
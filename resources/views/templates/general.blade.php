<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script defer src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- MDB -->
    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery-3.6.4.min.js') }}"></script>
    <script defer type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <script defer type="text/javascript" src="@yield('javascript')"></script>
    {{-- GSAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js" integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- TOASTR JS--}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>{{ config('app.name') }}</title>
    @yield('head')
</head>

<body>
    @yield('nav')
    @yield('body')
    @yield('footer')
</body>

</html>

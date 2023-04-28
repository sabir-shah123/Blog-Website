<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title> Blog | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- theme meta -->
    <meta name="theme-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('css')
</head>

<body>

    @include('frontend.components.header')
    @yield('content')
    @include('frontend.components.footer')

    <!-- # JS Plugins -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js')

</body>

</html>

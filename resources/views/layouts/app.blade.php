<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'e-library')</title>
    <!-- Link to Bootstrap CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('partials.header') <!-- Including the header partial -->
    @include('partials.navbar') <!-- Including the navbar partial -->
    <div class="container mt-4">
        @yield('content')
    </div>
    @include('partials.footer') <!-- Including the footer partial -->
    <!-- Link to Bootstrap JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

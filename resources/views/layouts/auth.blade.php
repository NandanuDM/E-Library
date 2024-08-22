@php
    $application = getApplication();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ Storage::disk('public')->exists($application->logo ? $application->logo : 'logo.jpg') ? asset('storage/'. $application->logo) : asset('AdminLTE-3.2.0/dist/img/AdminLTELogo.png') }}" rel="icon">
    <title>@yield('title') - {{ $application->name }}</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f6f9;
        }
        .login-box {
            margin-top: 10%;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b></b></a>
        </div>
        <!-- /.login-logo -->
        @yield('content')
    </div>
    <!-- /.login-box -->

    <!-- AdminLTE JS -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
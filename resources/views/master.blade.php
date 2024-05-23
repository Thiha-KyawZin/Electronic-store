<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css') }}">

    <!-- loader-->
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet" />

    <title>
        @yield('title')
    </title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            @yield('content')
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->
</body>
<!--plugins-->
<script src="{{ asset('admin/js/jquery.min.js')}}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/pace.min.js')}}"></script>

</html>

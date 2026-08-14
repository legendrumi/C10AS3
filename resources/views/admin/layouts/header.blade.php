<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') EminTech Admin</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">

    <style>
        .bg-grandient {

            background-color: #2c3e50;

        }
    </style>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</head>



<body class="bg-primary-subtle">



    @include('admin.layouts.navbar')



    <div class="container-xxl min-vh-100 py-4">

        @yield('content')

    </div>



    @include('client.layouts.footer')



</body>



</html>

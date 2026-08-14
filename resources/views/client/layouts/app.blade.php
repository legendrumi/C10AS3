<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-SHOP')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/bootstrap-icons.min.css') }}">
</head>

<body class="bg-primary-subtle d-flex flex-column min-vh-100">

    @include('client.layouts.header')

    <main class="flex-fill">
        @yield('content')
    </main>

    @include('client.layouts.footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

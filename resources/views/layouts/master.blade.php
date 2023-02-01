<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <main class="">
        {{-- <a href="{{ route('logout') }}" class="nav-link">Logout</a> --}}
        @include('layouts.sidebar')
        @include('component.pesan')

        @yield('content')
        @include('layouts.footer')
    </main>
</body>

</html>

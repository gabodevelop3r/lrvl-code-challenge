<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @section('header')
        @include('layouts.header')

    <body class="antialiased">

        <main>
            @yield('content')

        </main>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title', "Movies")</title>
    <!-- Styles -->
    @vite('resources/js/app.js')
</head>

<body class="bg-dark">
    @include('partials.header')
    <main>
        @yield('main_content')
    </main>
    @include('partials.footer')
</body>

</html>

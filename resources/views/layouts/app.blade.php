<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', __('app.site_title'))</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @stack('styles')
</head>
<body>
    @include('_includes.header')

    <main>
        @yield('content')
    </main>

    @include('_includes.footer')

    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://meet.jit.si/external_api.js'></script>
</head>
<body>
    <nav>
        ...
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'High Performance')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header>
        <h1>High Performance</h1>
        <nav>
            <a href="{{ route('calories.index') }}">Calorie</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>

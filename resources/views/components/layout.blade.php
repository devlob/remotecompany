<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32" id="app">
    {{ $slot }}
</div>
</body>
</html>

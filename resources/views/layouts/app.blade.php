<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('encabezado', 'Task App')</title>
    @vite('resources/css/app.css')  
    @yield('styles', '')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="mb-4 text-2xl " >@yield('title', 'App')</h1>
    <div>
        @yield('content')
    </div>
</body>
</html>
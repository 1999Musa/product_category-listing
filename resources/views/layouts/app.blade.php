<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Category</title>
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #3bbfd6;">
    <div class="container mx-auto py-8">
        @yield('content')
    </div>
</body>
</html>

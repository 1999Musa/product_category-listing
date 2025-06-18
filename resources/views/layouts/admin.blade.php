<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-indigo-600 text-white px-6 py-4 flex justify-between items-center">
        <div class="text-lg font-bold">
            Admin Panel
        </div>
        <div>
            <a href="{{ route('admin.products.index') }}" class="hover:underline mr-4">Products</a>
            <a href="{{ route('admin.categories.index') }}" class="hover:underline">Categories</a>
        </div>
    </nav>

    <!-- Content -->
    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-200 text-center py-4 text-gray-700 text-sm">
        &copy; {{ date('Y') }} Your Company. All rights reserved.
    </footer>

</body>
</html>

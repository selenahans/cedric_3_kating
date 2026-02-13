<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuan Buddy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#F8F9FD] text-gray-800 font-sans antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="hidden lg:flex flex-col w-64 bg-white border-r border-gray-100 h-full fixed inset-y-0 left-0 z-50">
            @include('components.navbar')
        </aside>

        <div class="flex-1 flex flex-col lg:ml-64 transition-all duration-300">
            
            <header class="bg-[#F8F9FD] px-8 py-6">
                @include('components.header')
            </header>

            <main class="flex-1 overflow-y-auto px-8 pb-8">
                @yield('content')
            </main>

        </div>
    </div>

</body>
</html>
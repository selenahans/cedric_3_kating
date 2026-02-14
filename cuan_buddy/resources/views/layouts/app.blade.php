<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Cuan Buddy')</title>

    {{-- 3. ALPINE.JS (WAJIB DITAMBAHKAN AGAR TAB & MODAL BERFUNGSI) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- Script & Library (Tailwind, ApexCharts, Fonts) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#308156',
                        primaryLight: '#e6f4ea',
                        darkText: '#1e293b',
                    },
                    fontFamily: {
                        'jakarta': ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hover-card {
            transition: all 0.3s ease;
        }

        .hover-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);
        }

        /* Animasi Custom untuk Header */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.2s ease-out forwards;
        }

        @keyframes swing {

            0%,
            100% {
                transform: rotate(0deg);
            }

            20% {
                transform: rotate(15deg);
            }

            40% {
                transform: rotate(-10deg);
            }

            60% {
                transform: rotate(5deg);
            }

            80% {
                transform: rotate(-5deg);
            }
        }

        .group-hover\:animate-swing:hover {
            animation: swing 0.5s ease-in-out;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <div class="flex h-screen overflow-hidden">

        {{-- Memanggil Component Navbar Samping (Sidebar) --}}
        @include('components.navbar')

        {{-- Main Content Wrapper --}}
        <main class="flex-1 lg:ml-64 h-full overflow-y-auto bg-slate-50 flex flex-col">

            {{-- Memanggil Component Header Atas --}}
            @include('components.header')

            {{-- Tempat Konten Berubah-ubah --}}
            {{-- <div class="p-6 lg:p-10 max-w-7xl mx-auto space-y-8 w-full"> --}}
            <div class="p-6 lg:p-10 w-full space-y-8 @yield('container_style', 'max-w-7xl mx-auto')"></div>
                @yield('content')
            </div>

        </main>
    </div>

    {{-- Stack untuk Script khusus per halaman --}}
    @stack('scripts')

</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    fontFamily: {
                        'jakarta': ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .coin-spin {
            animation: spin 4s linear infinite;
        }
        @keyframes spin {
            from { transform: rotateY(0deg); }
            to { transform: rotateY(360deg); }
        }
    </style>
</head>

<body class="bg-white text-[#2F3130] font-jakarta overflow-hidden">

    <main class="min-h-screen flex items-center justify-center px-6 relative">
        
        <div class="absolute top-10 left-10 w-40 h-40 bg-[#ECFFE4] rounded-full blur-3xl opacity-60 animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-60 h-60 bg-emerald-100 rounded-full blur-3xl opacity-50 animate-pulse"></div>

        <div class="max-w-2xl w-full text-center z-10 animate-fade-in-up">
            
            <div class="relative flex justify-center items-center mb-12">
                <h1 class="text-[12rem] md:text-[16rem] font-extrabold text-[#ECFFE4] leading-none select-none">
                    404
                </h1>
                
                <div class="absolute flex flex-col items-center animate-float">
                    <div class="bg-yellow-400 p-6 rounded-3xl shadow-2xl border-8 border-white coin-spin">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="w-16 h-3 bg-slate-200 rounded-full mt-8 blur-sm opacity-60"></div>
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-3xl md:text-5xl font-extrabold text-[#308156] tracking-tight">
                    Dompetnya <span class="text-[#2F3130]">Nyasar!</span>
                </h2>
                <p class="text-[#2F3130] text-lg md:text-xl max-w-lg mx-auto leading-relaxed">
                    Halaman yang kamu cari tidak ditemukan. Yuk, balik ke jalan finansial yang benar!
                </p>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/dashboard" 
                   class="w-full sm:w-auto px-10 py-4 bg-[#308156] text-white font-bold rounded-xl transition transform hover:scale-[1.05] shadow-lg shadow-[#a3d18a]">
                    Balik ke Dashboard
                </a>
                
                <button onclick="history.back()" 
                   class="w-full sm:w-auto px-10 py-4 bg-white border-2 border-[#E2E8F0] text-[#2F3130] font-bold rounded-xl hover:border-[#308156] hover:bg-slate-50 transition">
                    Kembali
                </button>
            </div>

            <div class="mt-16 text-[#2F3130]/40 text-sm font-medium">
                © 2026 Cuan Buddy • <span class="text-[#308156]">Nabung Jadi Seru</span>
            </div>
        </div>
    </main>

</body>
</html>
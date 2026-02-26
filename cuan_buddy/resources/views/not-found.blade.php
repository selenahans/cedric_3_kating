<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                        'shadow-pulse': 'shadowPulse 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0) rotate(0deg)' },
                            '50%': { transform: 'translateY(-30px) rotate(3deg)' },
                        },
                        shadowPulse: {
                            '0%, 100%': { transform: 'scaleX(1)', opacity: '0.4' },
                            '50%': { transform: 'scaleX(0.6)', opacity: '0.1' },
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
    </style>
</head>

<body class="bg-white text-[#2F3130] font-jakarta overflow-hidden">

    <main class="min-h-screen flex items-center justify-center px-6 relative bg-[#F8FAFC]">
        
        <div class="absolute w-[500px] h-[500px] bg-[#ECFFE4] rounded-full blur-3xl opacity-60 -top-20 -left-20 pointer-events-none"></div>
        <div class="absolute w-[400px] h-[400px] bg-emerald-50 rounded-full blur-3xl opacity-50 bottom-0 right-0 pointer-events-none"></div>

        <div class="max-w-2xl w-full text-center z-10 animate-fade-in-up">
            
            <div class="relative flex flex-col items-center justify-center mb-16">
                
                <div class="relative group">
                    <div class="absolute inset-0 bg-emerald-200 rounded-full blur-[80px] opacity-30 group-hover:opacity-50 transition-opacity"></div>
                    
                    <div class="relative w-56 h-56 md:w-72 md:h-72 animate-float">
                        <img src="{{ url('images/not-found/bingungg.webp') }}" 
                             alt="Pet Tersesat" 
                             class="w-full h-full object-contain drop-shadow-2xl transform transition group-hover:scale-105 duration-700">
                    </div>
                </div>             
                <div class="w-32 h-4 bg-slate-300/40 rounded-[100%] mt-4 blur-md animate-shadow-pulse"></div>
            </div>

            <div class="space-y-4">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#308156] tracking-tight">
                    Waduh, Halaman <span class="text-[#2F3130]">Hilang!</span>
                </h1>
                <p class="text-[#2F3130] text-lg md:text-xl max-w-md mx-auto leading-relaxed opacity-80">
                    Sepertinya pet kamu tersesat terlalu jauh. Yuk, bantu dia pulang ke dashboard!
                </p>
            </div>

            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/dashboard" 
                   class="w-full sm:w-auto px-12 py-4 bg-[#308156] text-white font-bold rounded-2xl transition transform hover:scale-[1.05] active:scale-95 shadow-xl shadow-emerald-200">
                    Balik ke Dashboard
                </a>
                
                <button onclick="history.back()" 
                   class="w-full sm:w-auto px-12 py-4 bg-white border-2 border-[#E2E8F0] text-[#2F3130] font-bold rounded-2xl hover:border-[#308156] hover:bg-slate-50 transition active:scale-95">
                    Kembali
                </button>
            </div>

            <div class="mt-16 text-[#2F3130]/40 text-sm font-medium">
                © 2026 Cuan Buddy • <span class="text-[#308156]">Level up your financial game.</span>
            </div>
        </div>
    </main>

</body>
</html>
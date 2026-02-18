<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                        'confetti': 'confetti 3s ease-out forwards',
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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        .success-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="bg-[#ECFFE4] text-slate-900 font-jakarta overflow-hidden">

    <div class="absolute w-[600px] h-[600px] bg-emerald-200/40 rounded-full blur-3xl opacity-60 -top-20 -left-20 pointer-events-none"></div>
    <div class="absolute w-[500px] h-[500px] bg-blue-100/60 rounded-full blur-3xl opacity-50 -bottom-20 -right-20 pointer-events-none"></div>

    <div class="min-h-screen flex items-center justify-center p-6 relative z-10">
        
        <div class="w-full max-w-[500px] animate-fade-in-up text-center">
            
            <div class="relative w-[220px] h-[220px] lg:w-[280px] lg:h-[280px] mx-auto mb-8">
                <img src="{{ url('images/success.webp') }}" alt="Success" 
                     class="w-full h-full object-contain drop-shadow-2xl animate-float">
                
                <div class="absolute bottom-4 right-4 bg-white p-3 rounded-2xl shadow-xl animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <div class="success-card p-8 lg:p-10 rounded-[40px] shadow-2xl shadow-emerald-200/50">
                <h1 class="text-3xl lg:text-4xl font-extrabold mb-4 text-[#308156]">Horee, Berhasil!</h1>
                <p class="text-[#2F3130] mb-8 leading-relaxed font-medium">
                    Buddy sudah siap menemanimu mengatur keuangan. Ayo mulai petualangan finansialmu sekarang!
                </p>

                <a href="{{ url('/dashboard') }}" 
                   class="inline-flex items-center justify-center w-full bg-[#308156] text-white font-bold py-4 px-8 rounded-2xl hover:bg-[#2a6a47] transition-all transform hover:scale-[1.03] shadow-lg shadow-emerald-200 group">
                    <span>Masuk ke Dashboard</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <p class="mt-6 text-xs text-slate-400 font-semibold tracking-wide uppercase">
                    Otomatis dialihkan dalam <span id="countdown">5</span> detik...
                </p>
            </div>

        </div>
    </div>

    <script>
        // Simple Countdown Logic
        document.addEventListener('DOMContentLoaded', () => {
            let timeLeft = 5;
            const countdownEl = document.getElementById('countdown');
            
            const timer = setInterval(() => {
                timeLeft--;
                countdownEl.textContent = timeLeft;
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    // window.location.href = "/dashboard"; // Uncomment untuk redirect beneran
                }
            }, 1000);
        });
    </script>

</body>
</html>
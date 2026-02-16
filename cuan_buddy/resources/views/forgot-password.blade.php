<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Cuan Buddy</title>

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
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .input-field {
            width: 100%;
            border: 1.5px solid #E2E8F0;
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            color: #0a2d0a;
            transition: all 0.3s ease;
            background-color: #F8FAFC;
        }

        .input-field:focus {
            outline: none;
            border-color: #34a20d;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }
    </style>
</head>

<body class="bg-white text-slate-900 font-jakarta overflow-x-hidden">

    <div class="min-h-screen flex w-full">

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-16 relative bg-white z-10">
            <div class="w-full max-w-[420px] animate-fade-in-up">

                <div class="lg:hidden mb-8 flex items-center gap-3">
                    <img src="{{ url('images/logo_cuan_buddy.webp') }}" alt="Logo" class="w-10 h-10">
                    <div class="flex items-center text-[26px] tracking-tight">
                        <span class="font-semibold text-[#358557]">cuan</span>
                        <span class="font-semibold ml-[2px] text-[#2F3130]">buddy</span>
                    </div>
                </div>

                <h1 class="text-3xl lg:text-4xl font-extrabold mb-3 text-[#308156]">Lupa Password?</h1>
                <p class="text-[#2F3130] mb-8 leading-relaxed">
                    Jangan khawatir! Buddy akan bantu kirimkan instruksi pemulihan ke email kamu agar kamu bisa kembali merawat pet-mu.
                </p>

                <form action="#" method="POST" class="space-y-6">
                    <div class="group">
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan email terdaftar" class="input-field" required>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#308156] text-white font-bold py-4 rounded-xl hover:bg-[#2a6a47] transition transform hover:scale-[1.02] shadow-lg shadow-[#a3d18a] flex items-center justify-center gap-2">
                        Kirim Link Pemulihan
                    </button>
                </form>

                <p class="mt-8 text-center text-[#2F3130] text-sm font-medium">
                    Ingat password-mu? <a href="#" class="font-bold text-[#308156] hover:text-[#2a6a47] transition">Masuk di sini</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 bg-[#ECFFE4] relative items-center justify-center overflow-hidden">
            <div class="absolute w-[600px] h-[600px] bg-emerald-100/60 rounded-full blur-3xl opacity-60 -top-20 -right-20 pointer-events-none"></div>
            <div class="absolute w-[400px] h-[400px] bg-blue-100/60 rounded-full blur-3xl opacity-50 bottom-0 left-0 pointer-events-none"></div>

            <div class="relative z-10 text-center max-w-lg px-6">
                <div class="relative w-full max-w-lg mx-auto overflow-hidden">
                    <div id="slides-rail" class="flex transition-transform duration-1000 ease-in-out">
                        
                        <div class="w-full flex-shrink-0 flex flex-col items-center">
                            <div class="relative w-[300px] h-[300px] lg:w-[400px] lg:h-[400px] mb-10">
                                <img src="{{ url('images/forgotpass.webp') }}" alt="security" class="w-full h-full object-contain drop-shadow-2xl animate-float">
                            </div>
                            <h2 class="text-3xl font-bold text-slate-800 mb-3 leading-tight text-center">
                                Keamanan data kamu <br> adalah <span class="text-emerald-600">Prioritas Kami</span>
                            </h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Cuan Buddy</title>

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
            padding: 0.875rem 1.25rem;
            font-size: 0.95rem;
            color: #1E293B;
            transition: all 0.3s ease;
            background-color: #F8FAFC;
        }

        .input-field:focus {
            outline: none;
            border-color: #059669;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .social-btn:hover {
            border-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-white text-slate-900 font-jakarta overflow-x-hidden">

    <div class="min-h-screen flex w-full">
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-16 relative bg-white z-10">
            <div class="w-full max-w-[440px] animate-fade-in-up">
                
                <div class="lg:hidden mb-6 flex items-center gap-2">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-bold">C</div>
                    <span class="font-bold text-xl">Cuan Buddy</span>
                </div>

                <h1 class="text-3xl lg:text-4xl font-extrabold mb-2 text-slate-900">Mulai Perjalananmu!</h1>
                <p class="text-slate-500 mb-6 leading-relaxed text-sm lg:text-base">Daftar sekarang dan mulailah mengadopsi pet finansial pertamamu untuk masa depan yang lebih mapan.</p>

                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="fullname" class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Nama Lengkap</label>
                        <input type="text" name="fullname" id="fullname" placeholder="Masukkan nama lengkap" class="input-field" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Email</label>
                        <input type="email" name="email" id="email" placeholder="contoh@email.com" class="input-field" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="relative">
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="••••••••" class="input-field pr-11" required>
                                <button type="button" class="toggle-pass absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition p-1" data-target="password">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="relative">
                            <label for="confirm_password" class="block text-sm font-semibold text-slate-700 mb-1.5 ml-1">Konfirmasi</label>
                            <div class="relative">
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••" class="input-field pr-11" required>
                                <button type="button" class="toggle-pass absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition p-1" data-target="confirm_password">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-2 pt-2">
                        <input id="terms" name="terms" type="checkbox" class="mt-1 h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded" required>
                        <label for="terms" class="text-xs text-slate-500 leading-normal">
                            Saya setuju dengan <a href="#" class="text-emerald-600 font-semibold hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-emerald-600 font-semibold hover:underline">Kebijakan Privasi</a> yang berlaku.
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl hover:bg-slate-800 transition transform hover:scale-[1.01] shadow-lg shadow-slate-200 mt-2">
                        Buat Akun Sekarang
                    </button>
                </form>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="px-4 bg-white text-slate-400 font-medium">Atau daftar dengan</span>
                    </div>
                </div>

                <div class="flex justify-center gap-4">
                    <button class="social-btn w-full py-3 px-4 rounded-xl border border-slate-200 flex items-center justify-center bg-white transition gap-3 text-sm font-semibold">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google"> Google
                    </button>
                    <button class="social-btn w-full py-3 px-4 rounded-xl border border-slate-200 flex items-center justify-center bg-white transition gap-3 text-sm font-semibold">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-5 h-5" alt="Facebook"> Facebook
                    </button>
                </div>

                <p class="mt-8 text-center text-slate-500 text-sm">
                    Sudah punya akun? <a href="login.html" class="font-bold text-emerald-600 hover:text-emerald-700 transition">Masuk di sini</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 bg-[#ECFFE4] relative items-center justify-center overflow-hidden">
            <div class="absolute w-[600px] h-[600px] bg-emerald-100/60 rounded-full blur-3xl opacity-60 -top-20 -right-20 pointer-events-none"></div>
            <div class="absolute w-[400px] h-[400px] bg-blue-100/60 rounded-full blur-3xl opacity-50 bottom-0 left-0 pointer-events-none"></div>

            <div class="relative z-10 text-center max-w-lg px-6">
                <div class="relative w-[400px] h-[400px] mx-auto mb-8">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/financial-growth-illustration-download-in-svg-png-gif-file-formats--analysis-chart-report-business-pack-illustrations-4760451.png" 
                         alt="Register Illustration" 
                         class="w-full h-full object-contain drop-shadow-2xl animate-float">
                </div>
                <h2 class="text-3xl font-bold text-slate-800 mb-4 leading-tight">
                    Selangkah lagi menuju <br> <span class="text-emerald-600">Kebebasan Finansial</span>
                </h2>
                <p class="text-slate-600">Gabung bersama 10.000+ pengguna lainnya yang telah berhasil mengontrol pengeluaran mereka dengan bantuan si Cuan.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Toggle Password Visibility Logic
            const toggleButtons = document.querySelectorAll('.toggle-pass');
            
            toggleButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    
                    // Toggle type
                    const isPassword = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isPassword ? 'text' : 'password');

                    // Update Icon (Simple toggle with opacity or SVG path change)
                    this.style.color = isPassword ? '#059669' : '#94A3B8';
                });
            });
        });
    </script>
</body>
</html>
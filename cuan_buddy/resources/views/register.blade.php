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

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .input-field:-webkit-autofill,
        .input-field:-webkit-autofill:hover,
        .input-field:-webkit-autofill:focus,
        .input-field:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #F8FAFC inset !important;
            -webkit-text-fill-color: #0a2d0a !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .input-field:focus:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 30px #ffffff inset !important;
        }

        /* Styling Input Custom */
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
        .input-field::placeholder {
            color: gray;
        }
        .social-btn {
            position: relative;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 1px solid #E2E8F0; 
        }
        .social-btn:hover {
            border-color: #34d399;
            background-color: #F0FDF4;
            transform: translateY(-3px); 
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.15), 
                        0 4px 6px -2px rgba(16, 185, 129, 0.1); 
        }
        .social-btn:active {
            transform: translateY(-1px);
            box-shadow: 0 5px 10px -3px rgba(16, 185, 129, 0.15);
        }
    </style>
</head>

<body class="bg-white text-slate-900 font-jakarta overflow-x-hidden">

    <div class="min-h-screen flex w-full">
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-16 relative bg-white z-10">
            <div class="w-full max-w-[440px] animate-fade-in-up">

                <div class="lg:hidden mb-6 flex items-center gap-3 select-none">
                    <div class="flex-shrink-0">
                        <img src="{{ url('images/logo_cuan_buddy.webp') }}" alt="Logo Cuan Buddy"
                            class="w-10 h-10 object-contain" style="display:block;">
                    </div>

                    <div class="flex items-center text-[26px] leading-none tracking-tight"
                        style="font-family: 'Lufga', sans-serif;">
                        <span class="font-semibold" style="color: #358557;">cuan</span>
                        <span class="font-semibold ml-[2px]" style="color: #2F3130;">buddy</span>
                    </div>
                </div>

                <h1 class="text-3xl lg:text-4xl font-extrabold mb-2 text-[#308156]">Mulai Perjalananmu!</h1>
                <p class="text-[#2F3130] mb-6 leading-relaxed text-sm lg:text-base">Daftar sekarang dan mulailah
                    mengadopsi pet finansial pertamamu untuk masa depan yang lebih mapan.</p>

                <form action="{{route('register.process')}}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#0E6436] mb-1.5 ml-1">Nama
                            Lengkap</label>
                        <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap"
                            class="input-field" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#0E6436] mb-1.5 ml-1">Email</label>
                        <input type="email" name="email" id="email" placeholder="contoh@email.com" class="input-field"
                            required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="relative">
                            <label for="password" class="block text-sm font-semibold text-[#0E6436] mb-1.5 ml-1">Kata
                                Sandi</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="Isi Kata Sandi"
                                    class="input-field pr-11" required>
                                <button type="button"
                                    class="toggle-pass absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition p-1"
                                    data-target="password">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="relative">
                            <label for="password_confirmation"
                                class="block text-sm font-semibold text-[#0E6436] mb-1.5 ml-1">Konfirmasi</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Ulang"
                                    class="input-field pr-11" required>
                                <button type="button"
                                    class="toggle-pass absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition p-1"
                                    data-target="password_confirmation">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start gap-2 pt-2">
                        <input id="terms" name="terms" type="checkbox"
                            class="mt-1 h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded"
                            required>
                        <label for="terms" class="text-xs text-slate-500 leading-normal">
                            Saya setuju dengan <a href="#" class="text-emerald-600 font-semibold hover:underline">Syarat
                                & Ketentuan</a> serta <a href="#"
                                class="text-emerald-600 font-semibold hover:underline">Kebijakan Privasi</a> yang
                            berlaku.
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#308156] text-white font-bold py-4 rounded-xl hover:bg-[#2a6a47] transition transform hover:scale-[1.02] shadow-lg shadow-[#a3d18a]">
                        Buat Akun Sekarang
                    </button>
                </form>

                <p class="mt-8 text-center text-slate-500 text-sm">
                    Sudah punya akun? <a href="login"
                        class="font-bold text-[#308156] hover:text-[#2a6a47] transition">Masuk di sini</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 bg-[#ECFFE4] relative items-center justify-center overflow-hidden">
            <div
                class="absolute w-[600px] h-[600px] bg-emerald-100/60 rounded-full blur-3xl opacity-60 -top-20 -right-20 pointer-events-none">
            </div>
            <div
                class="absolute w-[400px] h-[400px] bg-blue-100/60 rounded-full blur-3xl opacity-50 bottom-0 left-0 pointer-events-none">
            </div>

            <div class="relative z-10 text-center max-w-lg px-6">
                <div class="relative w-[400px] h-[400px] mx-auto mb-8">
                    <img src="{{ url('images/register/register.webp') }}" alt="register"
                                    class="w-full h-full object-contain drop-shadow-2xl animate-float">
                </div>
                <h2 class="text-3xl font-bold text-slate-800 mb-4 leading-tight">
                    Selangkah lagi menuju <br> <span class="text-emerald-600">Kebebasan Finansial</span>
                </h2>
                <p class="text-slate-600">Gabung bersama 10.000+ pengguna lainnya yang telah berhasil mengontrol
                    pengeluaran mereka dengan bantuan Cuan Buddy.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Toggle Password Visibility Logic
            const toggleButtons = document.querySelectorAll('.toggle-pass');

            toggleButtons.forEach(btn => {
                btn.addEventListener('click', function () {
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
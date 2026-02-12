<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
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

        /* Styling Input Custom */
        .input-field {
            width: 100%;
            border: 1.5px solid #E2E8F0;
            border-radius: 0.75rem; /* rounded-xl */
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
            color: #1E293B;
            transition: all 0.3s ease;
            background-color: #F8FAFC;
        }

        .input-field:focus {
            outline: none;
            border-color: #059669; /* Emerald 600 */
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-field::placeholder {
            color: #94A3B8;
        }

        /* Social Button Hover Effect */
        .social-btn:hover {
            border-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="bg-white text-slate-900 font-jakarta overflow-x-hidden">

    <div class="min-h-screen flex w-full">

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-16 relative bg-white z-10">
            <div class="w-full max-w-[420px] animate-fade-in-up">
                
                <div class="lg:hidden mb-8 flex items-center gap-2">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white font-bold">C</div>
                    <span class="font-bold text-xl">Cuan Buddy</span>
                </div>

                <h1 class="text-3xl lg:text-4xl font-extrabold mb-3 text-slate-900">Welcome back!</h1>
                <p class="text-slate-500 mb-8 leading-relaxed">Simplify your workflow and boost your productivity with Cuan Buddy. Get started for free.</p>

                <form action="#" method="POST" class="space-y-5">
                    <div class="group">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="input-field peer" required>
                    </div>

                    <div class="relative group">
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="input-field peer pr-12" required>
                        
                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-emerald-600 transition p-1">
                            <svg id="eye-off" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                            <svg id="eye-on" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-slate-500">Remember me</label>
                        </div>
                        <a href="#" class="text-sm font-semibold text-slate-500 hover:text-emerald-600 transition">Forgot Password?</a>
                    </div>

                    <button type="submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl hover:bg-slate-800 transition transform hover:scale-[1.02] shadow-lg shadow-slate-200">
                        Login
                    </button>
                </form>

                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-slate-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-slate-400 font-medium">or continue with</span>
                    </div>
                </div>

                <div class="flex justify-center gap-4">
                    <button class="social-btn w-14 h-14 rounded-full border border-slate-200 flex items-center justify-center bg-white transition hover:bg-slate-50">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google">
                    </button>
                    <button class="social-btn w-14 h-14 rounded-full border border-slate-200 flex items-center justify-center bg-white transition hover:bg-slate-50">
                        <img src="https://www.svgrepo.com/show/475635/apple-black.svg" class="w-6 h-6" alt="Apple">
                    </button>
                    <button class="social-btn w-14 h-14 rounded-full border border-slate-200 flex items-center justify-center bg-white transition hover:bg-slate-50">
                        <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-6 h-6" alt="Facebook">
                    </button>
                </div>

                <p class="mt-8 text-center text-slate-500 text-sm">
                    Not a member? <a href="#" class="font-bold text-emerald-600 hover:text-emerald-700 transition">Register now</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 bg-[#F0FDF4] relative items-center justify-center overflow-hidden">
            <div class="absolute w-[600px] h-[600px] bg-emerald-100/60 rounded-full blur-3xl opacity-60 -top-20 -right-20 pointer-events-none"></div>
            <div class="absolute w-[400px] h-[400px] bg-blue-100/60 rounded-full blur-3xl opacity-50 bottom-0 left-0 pointer-events-none"></div>
            
            <div class="relative z-10 text-center max-w-lg px-6">
                
                <div class="relative w-[400px] h-[400px] mx-auto mb-10">
                    
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/woman-meditating-illustration-download-in-svg-png-gif-file-formats--yoga-exercise-healthy-lifestyle-activity-pack-people-illustrations-4760460.png" 
                         alt="Relax Illustration" 
                         class="w-full h-full object-contain drop-shadow-2xl animate-float-delayed"
                         style="filter: drop-shadow(0 20px 30px rgba(16, 185, 129, 0.15));">

                    <div class="absolute bottom-16 -left-8 bg-white p-4 rounded-2xl shadow-xl border border-slate-100 animate-float flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-bold text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z" clip-rule="evenodd" />
                            </svg>                              
                        </div>
                        <div class="text-left">
                            <p class="text-xs font-bold text-slate-800">Finance Goal</p>
                            <p class="text-[10px] text-slate-400">Target Tercapai</p>
                        </div>
                        <div class="ml-2 w-8 h-8 rounded-full border-[3px] border-emerald-500 flex items-center justify-center text-[9px] font-bold text-emerald-600 bg-emerald-50">84%</div>
                    </div>

                    <div class="absolute top-20 -right-4 bg-white p-1.5 rounded-full shadow-lg animate-float-delayed">
                        <img src="https://i.pravatar.cc/100?img=5" alt="User 1" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                    </div>

                     <div class="absolute top-10 left-4 bg-white p-1.5 rounded-full shadow-lg animate-float">
                        <img src="https://i.pravatar.cc/100?img=12" alt="User 2" class="w-10 h-10 rounded-full border-2 border-white object-cover">
                    </div>
                </div>

                <h2 class="text-3xl font-bold text-slate-800 mb-3 leading-tight">Make your finance easier and <br> organized with <span class="text-emerald-600">Cuan Buddy</span></h2>
                
                <div class="flex justify-center gap-2 mt-8">
                    <div class="w-2.5 h-2.5 rounded-full bg-slate-300 cursor-pointer hover:bg-emerald-400 transition"></div>
                    <div class="w-8 h-2.5 rounded-full bg-emerald-600 cursor-pointer"></div>
                    <div class="w-2.5 h-2.5 rounded-full bg-slate-300 cursor-pointer hover:bg-emerald-400 transition"></div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            
            // Toggle Password Visibility
            const toggleBtn = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeOff = document.getElementById('eye-off');
            const eyeOn = document.getElementById('eye-on');

            if(toggleBtn && passwordInput) {
                toggleBtn.addEventListener('click', () => {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    eyeOff.classList.toggle('hidden');
                    eyeOn.classList.toggle('hidden');
                });
            }
        });
    </script>

</body>
</html>
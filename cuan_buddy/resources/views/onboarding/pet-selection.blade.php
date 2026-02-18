<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Partner - Cuan Buddy</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'blob': 'blob 7s infinite',
                        'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1)',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        blob: {
                            "0%": { transform: "translate(0px, 0px) scale(1)" },
                            "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                            "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                            "100%": { transform: "translate(0px, 0px) scale(1)" },
                        },
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

        /* --- UTILITIES --- */
        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* --- FORM ELEMENTS --- */
        .input-field {
            width: 100%;
            border: 1.5px solid #E2E8F0;
            border-radius: 0.75rem;
            padding: 1rem 1.25rem;
            font-size: 1.1rem;
            color: #0a2d0a;
            transition: all 0.3s ease;
            background-color: #F8FAFC;
            /* Putih transparan */
            text-align: center;
            font-weight: 600;
            backdrop-filter: blur(4px);
        }

        .input-field:focus {
            outline: none;
            border-color: #34a20d;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-field::placeholder {
            color: #94A3B8;
            font-weight: 400;
        }

        /* --- PET CARD STYLING --- */
        .pet-card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.6);
            /* Semi transparan agar bg noise terlihat dikit */
            backdrop-filter: blur(8px);
        }

        .pet-card.selected {
            border-color: #10B981;
            background-color: #ECFDF5;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px -3px rgba(16, 185, 129, 0.2);
        }

        .pet-card:not(.selected):hover {
            border-color: #A7F3D0;
            background-color: #ffffff;
            transform: translateY(-2px);
        }

        /* Hide Scrollbar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="text-slate-900 font-jakarta overflow-x-hidden relative min-h-screen flex items-center justify-center">

    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none bg-slate-50">
        <div
            class="absolute top-0 left-[-10%] w-[500px] h-[500px] bg-yellow-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob">
        </div>

        <div class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-purple-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob"
            style="animation-delay: 2s"></div>

        <div class="absolute bottom-[-20%] left-[20%] w-[600px] h-[600px] bg-emerald-200/60 rounded-full mix-blend-multiply filter blur-[100px] opacity-70 animate-blob"
            style="animation-delay: 4s"></div>

        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
    </div>
    <div class="w-full max-w-5xl px-6 py-8 relative z-10 animate-fade-in-up">

        <a href="{{ url('/') }}"
            class="inline-flex items-center gap-2 text-slate-500 hover:text-[#308156] transition mb-6 font-semibold group">
            <div
                class="w-10 h-10 rounded-full bg-white/60 border border-slate-200 flex items-center justify-center group-hover:border-[#308156] group-hover:bg-white transition shadow-sm backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </div>
            <span class="text-lg">Kembali</span>
        </a>

        <div class="bg-white/70 backdrop-blur-xl border border-white/60 shadow-2xl rounded-[2rem] p-6 lg:p-12">

            <div class="text-center mb-10">
                <h1 class="text-3xl lg:text-4xl font-extrabold text-[#308156] mb-3">Pilih Partner Keuanganmu</h1>
                <p class="text-[#2F3130] max-w-lg mx-auto leading-relaxed text-lg">
                    Setiap partner memiliki keunikan sendiri. Pilih yang paling cocok dengan gaya menabungmu!
                </p>
            </div>

            <form action="#" method="POST">
                @csrf
                <input type="hidden" name="selected_pet" id="selected_pet_input" required>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-12">

                    <div class="pet-card border-2 border-slate-200 rounded-2xl p-6 flex flex-col items-center group"
                        onclick="selectPet(this, 'cat')">
                        <div class="absolute top-3 right-3 opacity-0 check-icon transition-opacity duration-300">
                            <div
                                class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-32 h-32 mb-4 drop-shadow-lg">
                            <img src="{{ url('images/pet/lele.webp') }}" alt="lele"
                                class="w-full h-full object-contain animate-float" style="animation-delay: 1s;">

                        </div>
                        <h3 class="font-bold text-slate-800 text-xl">Si Cermat</h3>
                        <p class="text-sm text-slate-500 text-center mt-1">Ahli mencari diskon & promo terbaik.</p>
                    </div>

                    <div class="pet-card border-2 border-slate-200 rounded-2xl p-6 flex flex-col items-center group"
                        onclick="selectPet(this, 'dog')">
                        <div class="absolute top-3 right-3 opacity-0 check-icon transition-opacity duration-300">
                            <div
                                class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-32 h-32 mb-4 drop-shadow-lg">
                            <img src="{{ url('images/pet/lala.webp') }}" alt="lala"
                                class="w-full h-full object-contain animate-float" style="animation-delay: 1s;">
                        </div>
                        <h3 class="font-bold text-slate-800 text-xl">Si Penjaga</h3>
                        <p class="text-sm text-slate-500 text-center mt-1">Disiplin menjaga tabunganmu tetap aman.</p>
                    </div>

                    <div class="pet-card border-2 border-slate-200 rounded-2xl p-6 flex flex-col items-center group"
                        onclick="selectPet(this, 'rabbit')">
                        <div class="absolute top-3 right-3 opacity-0 check-icon transition-opacity duration-300">
                            <div
                                class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-32 h-32 mb-4 drop-shadow-lg">
                            <img src="{{ url('images/pet/lulu.webp') }}" alt="lulu"
                                class="w-full h-full object-contain animate-float" style="animation-delay: 1s;">

                        </div>
                        <h3 class="font-bold text-slate-800 text-xl">Si Gesit</h3>
                        <p class="text-sm text-slate-500 text-center mt-1">Cepat mencapai target jangka pendek.</p>
                    </div>

                    <div class="pet-card border-2 border-slate-200 rounded-2xl p-6 flex flex-col items-center group"
                        onclick="selectPet(this, 'bear')">
                        <div class="absolute top-3 right-3 opacity-0 check-icon transition-opacity duration-300">
                            <div
                                class="w-6 h-6 bg-emerald-500 rounded-full flex items-center justify-center text-white shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-32 h-32 mb-4 drop-shadow-lg">
                            <img src="{{ url('images/pet/lili.webp') }}" alt="lili"
                                class="w-full h-full object-contain animate-float" style="animation-delay: 1s;">
                        </div>
                        <h3 class="font-bold text-slate-800 text-xl">Si Kalem</h3>
                        <p class="text-sm text-slate-500 text-center mt-1">Investasi jangka panjang yang stabil.</p>
                    </div>
                </div>

                <div class="max-w-md mx-auto">
                    <label for="pet_name"
                        class="block text-sm font-semibold text-slate-700 mb-3 text-center uppercase tracking-wide">Beri
                        Nama Partner Barumu</label>

                    <div class="relative">
                        <input type="text" name="pet_name" id="pet_name" placeholder="Contoh: CuanMaster"
                            class="input-field py-4 text-xl shadow-sm" required>
                    </div>

                    <button type="submit"
                        class="mt-8 w-full bg-[#308156] text-white font-bold py-4 rounded-xl hover:bg-[#2a6a47] transition transform hover:scale-[1.02] shadow-xl shadow-[#a3d18a] flex items-center justify-center gap-2 group text-lg">
                        Lanjut Petualangan
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                            stroke="currentColor" class="w-6 h-6 group-hover:translate-x-1 transition">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function selectPet(card, value) {
            // Reset state
            document.querySelectorAll('.pet-card').forEach(c => {
                c.classList.remove('selected');
                c.querySelector('.check-icon').classList.add('opacity-0');
            });

            // Activate current card
            card.classList.add('selected');
            card.querySelector('.check-icon').classList.remove('opacity-0');

            // Set value input
            document.getElementById('selected_pet_input').value = value;

            // Auto focus ke nama
            document.getElementById('pet_name').focus();
        }
    </script>
</body>

</html>
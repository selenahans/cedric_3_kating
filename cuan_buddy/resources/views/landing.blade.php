<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuan Buddy - Teman Cuanmu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @vite('resources/css/app.css')
</head>

<body class="bg-[#F8FAFC] text-slate-900 selection:bg-indigo-100 selection:text-indigo-700">

    <nav class="fixed w-full z-50 glass border-b border-slate-200/60">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2.5">
                    <div
                        class="w-10 h-10 bg-hijau-tua rounded-xl shadow-lg shadow-indigo-200 flex items-center justify-center text-white font-extrabold text-xl italic">
                        C</div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">Cuan Buddy</span>
                </div>

                <div class="hidden md:flex items-center gap-10">
                    <a href="#features"
                        class="text-sm font-semibold text-slate-600 hover:text-[#0F9447] transition">Fitur</a>
                    <a href="#gamification"
                        class="text-sm font-semibold text-slate-600 hover:text-[#0F9447] transition">Cara Kerja</a>
                    <div class="h-6 w-[1px] bg-slate-200"></div>
                    <a href="#" class="text-sm font-semibold text-slate-700 hover:text-[#0F9447] transition">Masuk</a>
                    <a href="#"
                        class="bg-[#B2EE98] text-[#124929] px-6 py-3 rounded-xl text-sm font-bold hover:bg-[#A0D38A] transition shadow-xl ">Mulai
                        Gratis</a>
                </div>

                <div class="md:hidden p-2 bg-slate-100 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                    </svg>
                </div>
            </div>
        </div>
    </nav>

    <section class="relative pt-40 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div
                class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-[#0F9447]-10 border border-indigo-100 text-[#0F9447] text-xs font-bold mb-8 animate-bounce">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#0F9447] opacity-40"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#0F9447]"></span>
                </span>
                #1 Gamified Finance App di Indonesia
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 mb-8 leading-[1.1]">
                Nabung Terasa Seperti <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-violet-600">Main Game
                    RPG.</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto mb-12 leading-relaxed">
                Ubah kebiasaan borosmu menjadi petualangan epik. Dapatkan XP setiap kali kamu hemat, lawan bos
                "Inflasi", dan naikkan level finansialmu sekarang.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-5">
                <a href="#"
                    class="group relative px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg hover:bg-indigo-700 transition-all shadow-2xl shadow-indigo-200 overflow-hidden">
                    <span class="relative z-10">Mulai Quest Pertama</span>
                    <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                </a>
                <a href="#features"
                    class="px-8 py-4 bg-white border border-slate-200 text-slate-700 rounded-2xl font-bold text-lg hover:bg-slate-50 transition shadow-sm">Pelajari
                    Fitur</a>
            </div>
        </div>

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-gradient-to-b from-indigo-50/50 to-transparent rounded-full blur-3xl -z-10">
        </div>
    </section>

    <section class="pb-24 px-6">
        <div
            class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
            <div class="text-center">
                <div class="text-3xl font-extrabold text-slate-900">12k+</div>
                <div class="text-sm text-slate-500 font-medium">Active Players</div>
            </div>
            <div class="text-center border-l border-slate-100">
                <div class="text-3xl font-extrabold text-indigo-600">98%</div>
                <div class="text-sm text-slate-500 font-medium">Savings Success</div>
            </div>
            <div class="text-center border-l border-slate-100">
                <div class="text-3xl font-extrabold text-slate-900">500+</div>
                <div class="text-sm text-slate-500 font-medium">Daily Quests</div>
            </div>
            <div class="text-center border-l border-slate-100">
                <div class="text-3xl font-extrabold text-indigo-600">24/7</div>
                <div class="text-sm text-slate-500 font-medium">Auto Tracking</div>
            </div>
        </div>
    </section>

    <section id="features" class="py-24 px-6 bg-[#0F4D2D] rounded-[3rem] mx-4 md:mx-10 mb-20 text-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Fitur Utama untuk <br> Pejuang Finansial</h2>
                    <p class="text-slate-400">Kami menggabungkan manajemen uang tradisional dengan elemen psikologi game
                        yang bikin ketagihan (dalam artian positif!).</p>
                </div>
                <a href="#" class="text-indigo-400 font-bold hover:text-indigo-300 transition flex items-center gap-2">
                    Lihat semua fitur
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-slate-800/50 p-10 rounded-[2rem] border border-slate-700 hover:border-indigo-500/50 transition duration-500">
                    <div
                        class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-indigo-900/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75m0 1.5v.75m0 1.5v.75m0 1.5V15h1.5V4.5h-1.5zm1.5 15v-1.5a1.5 1.5 0 011.5-1.5h13.5a1.5 1.5 0 011.5 1.5v1.5H5.25z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Daily Loot & Streak</h3>
                    <p class="text-slate-400 leading-relaxed">Catat transaksi selama 7 hari berturut-turut untuk
                        mendapatkan "Legendary Loot" dan multiplier XP.</p>
                </div>

                <div
                    class="bg-indigo-600 p-10 rounded-[2rem] shadow-2xl shadow-indigo-900/20 transform md:-translate-y-4">
                    <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0V9.457c0-.621-.504-1.125-1.125-1.125h-.872M9.507 8.332V4.5a2.25 2.25 0 014.5 0v3.832m-4.5 0h4.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-white">Boss Battle (Budget)</h3>
                    <p class="text-indigo-100 leading-relaxed">Tetapkan budget bulanan sebagai "Boss". Jika kamu
                        berhasil di bawah budget, Boss kalah dan kamu naik level!</p>
                </div>

                <div
                    class="bg-slate-800/50 p-10 rounded-[2rem] border border-slate-700 hover:border-indigo-500/50 transition duration-500">
                    <div
                        class="w-14 h-14 bg-indigo-600 rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-indigo-900/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-white">Leaderboard</h3>
                    <p class="text-slate-400 leading-relaxed">Bandingkan skor kedisiplinan finansialmu dengan teman atau
                        secara global di seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-12 px-6">
        <div
            class="max-w-7xl mx-auto border-t border-slate-200 pt-12 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-2.5">
                <div
                    class="w-8 h-8 bg-slate-900 rounded-lg flex items-center justify-center text-white font-bold text-sm italic">
                    D</div>
                <span class="font-bold text-slate-800">Cuan Buddy</span>
            </div>
            <p class="text-sm text-slate-500 font-medium">© 2026 Cuan Buddy. Level up your financial game.</p>
            <div class="flex gap-8">
                <a href="#" class="text-slate-500 hover:text-[#0F9447] transition text-sm font-bold">Twitter</a>
                <a href="#" class="text-slate-500 hover:text-[#0F9447] transition text-sm font-bold">TikTok</a>
                <a href="#" class="text-slate-500 hover:text-[#0F9447] transition text-sm font-bold">Github</a>
            </div>
        </div>
    </footer>

</body>

</html>
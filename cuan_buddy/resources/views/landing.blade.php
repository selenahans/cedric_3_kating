<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuan Buddy - Teman Cuanmu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        blob: "blob 7s infinite",
                    },
                    keyframes: {
                        blob: {
                            "0%": { transform: "translate(0px, 0px) scale(1)" },
                            "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                            "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                            "100%": { transform: "translate(0px, 0px) scale(1)" },
                        },
                    },
                },
            },
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #0F9447;
            border-radius: 5px;
        }

        /* Animation Classes */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Smooth Accordion */
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease;
            max-height: 0;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-900 selection:bg-emerald-100 selection:text-emerald-700 overflow-x-hidden relative">
    <x-background/>
    <nav class="fixed w-full z-50 glass border-b border-slate-200/60 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2.5 z-50">
                    <div>
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center ">
                            <img src="{{ url('images/logo_cuan_buddy.webp') }}" alt="LOGO PIMUS"
                                class="responsive-logo content-logo" style="display:block;">
                        </div>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">Cuan Buddy</span>
                </div>

                <div class="hidden md:flex items-center gap-10">
                    <a href="#features"
                        class="text-sm font-semibold text-slate-600 hover:text-[#0F9447] transition">Fitur</a>
                    <a href="#cara-kerja"
                        class="text-sm font-semibold text-slate-600 hover:text-[#0F9447] transition">Cara Kerja</a>
                    <a href="#faq" class="text-sm font-semibold text-slate-600 hover:text-[#0F9447] transition">FAQ</a>
                    <div class="h-6 w-[1px] bg-slate-200"></div>
                    <a href="#" class="text-sm font-semibold text-slate-700 hover:text-[#0F9447] transition">Masuk</a>
                    <a href="#"
                        class="bg-[#0F9447] text-white px-6 py-3 rounded-xl text-sm font-bold hover:bg-emerald-700 transition shadow-lg shadow-emerald-200/50">
                        Mulai Gratis
                    </a>
                </div>

                <div class="md:hidden z-50">
                    <button id="mobile-menu-btn"
                        class="p-2 bg-slate-100 rounded-lg text-slate-600 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" class="w-6 h-6 transition-transform duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        </svg>
                        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor"
                            class="w-6 h-6 hidden transition-transform duration-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu"
            class="fixed inset-0 bg-white/95 backdrop-blur-xl z-40 transform translate-y-[-100%] transition-transform duration-500 ease-in-out md:hidden flex flex-col items-center justify-center gap-8 opacity-0 pointer-events-none">
            <a href="#features" class="text-2xl font-bold text-slate-800 hover:text-emerald-600 mobile-link">Fitur</a>
            <a href="#cara-kerja" class="text-2xl font-bold text-slate-800 hover:text-emerald-600 mobile-link">Cara
                Kerja</a>
            <a href="#faq" class="text-2xl font-bold text-slate-800 hover:text-emerald-600 mobile-link">FAQ</a>
            <a href="#" class="text-2xl font-bold text-slate-800 hover:text-emerald-600 mobile-link">Masuk</a>
            <a href="#"
                class="bg-[#0F9447] text-white px-8 py-4 rounded-2xl text-xl font-bold shadow-xl mobile-link">Mulai
                Gratis</a>
        </div>
    </nav>

    <section class="relative pt-40 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center reveal">
            <div
                class="inline-flex items-center gap-2 py-2 px-4 rounded-full bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-bold mb-8 animate-bounce">
                <span class="relative flex h-2 w-2">
                    <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-500 opacity-40"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                </span>
                #1 Gamified Finance App di Indonesia
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 mb-8 leading-[1.1]">
                Nabung Terasa Seperti <br>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-500">Main Game
                    RPG.</span>
            </h1>

            <p class="text-lg md:text-xl text-slate-500 max-w-2xl mx-auto mb-12 leading-relaxed">
                Ubah kebiasaan borosmu menjadi petualangan epik. Dapatkan XP setiap kali kamu hemat, lawan bos
                "Inflasi", dan naikkan level finansialmu sekarang.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-5">
                <a href="#"
                    class="group relative px-8 py-4 bg-[#0F9447] text-white rounded-2xl font-bold text-lg hover:bg-[#0b6e34] transition-all shadow-2xl shadow-emerald-200 overflow-hidden">
                    <span class="relative z-10">Mulai Quest Pertama</span>
                    <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                </a>
                <a href="#features"
                    class="px-8 py-4 bg-white border border-slate-200 text-slate-700 rounded-2xl font-bold text-lg hover:bg-slate-50 transition shadow-sm">
                    Pelajari Fitur
                </a>
            </div>
        </div>

        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[1000px] h-[600px] bg-gradient-to-b from-emerald-50/60 to-transparent rounded-full blur-3xl -z-10">
        </div>
    </section>

    <section id="cara-kerja" class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="reveal">
                    <div class="flex gap-2 mb-4">
                        <span class="h-3 w-3 rounded-full bg-yellow-400"></span>
                        <span class="h-3 w-3 rounded-full bg-purple-500"></span>
                        <span class="h-3 w-3 rounded-full bg-orange-500"></span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                        Smarter Ways to <br> Grow and Manage <br> Your Money
                    </h2>
                    <p class="text-slate-500 text-lg mb-8 leading-relaxed">
                        Track expenses, send money instantly, and stay in control — all from one simple dashboard that
                        feels like a game HUD.
                    </p>
                    <div class="flex gap-4">
                        <a href="#"
                            class="bg-slate-900 text-white px-6 py-3 rounded-xl font-semibold hover:bg-slate-800 transition">Get
                            Started</a>
                        <a href="#"
                            class="border border-slate-300 px-6 py-3 rounded-xl font-semibold hover:bg-slate-50 transition">See
                            Pricing</a>
                    </div>
                </div>

                <div class="relative reveal delay-200">
                    <div
                        class="absolute -top-10 -right-10 w-full h-full bg-gradient-to-tr from-emerald-100 to-purple-100 rounded-[3rem] -z-10 blur-2xl opacity-60">
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-xl border border-slate-100 relative z-10">
                        <div class="flex justify-between items-center mb-8">
                            <div>
                                <p class="text-slate-500 text-sm">Total Balance</p>
                                <h3 class="text-3xl font-bold text-slate-900">Rp 12.500.000</h3>
                            </div>
                            <div class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">+12%
                                EXP</div>
                        </div>
                        <div class="h-40 flex items-end justify-between gap-2">
                            <div
                                class="w-full bg-slate-100 rounded-t-lg h-[40%] hover:bg-emerald-400 transition-colors duration-500">
                            </div>
                            <div
                                class="w-full bg-slate-100 rounded-t-lg h-[60%] hover:bg-emerald-400 transition-colors duration-500">
                            </div>
                            <div class="w-full bg-emerald-500 rounded-t-lg h-[80%] shadow-lg shadow-emerald-200"></div>
                            <div
                                class="w-full bg-slate-100 rounded-t-lg h-[50%] hover:bg-emerald-400 transition-colors duration-500">
                            </div>
                            <div
                                class="w-full bg-slate-100 rounded-t-lg h-[70%] hover:bg-emerald-400 transition-colors duration-500">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="pb-24 px-6 reveal">
        <div
            class="max-w-5xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 bg-white p-8 rounded-[2rem] shadow-lg shadow-slate-200/50 border border-slate-100">
            <div class="text-center group cursor-pointer">
                <div class="text-3xl font-extrabold text-slate-900 group-hover:text-emerald-600 transition">12k+</div>
                <div class="text-sm text-slate-500 font-medium">Active Players</div>
            </div>
            <div class="text-center border-l border-slate-100 group cursor-pointer">
                <div class="text-3xl font-extrabold text-emerald-600 group-hover:scale-110 transition-transform">98%
                </div>
                <div class="text-sm text-slate-500 font-medium">Savings Success</div>
            </div>
            <div class="text-center border-l border-slate-100 group cursor-pointer">
                <div class="text-3xl font-extrabold text-slate-900 group-hover:text-emerald-600 transition">500+</div>
                <div class="text-sm text-slate-500 font-medium">Daily Quests</div>
            </div>
            <div class="text-center border-l border-slate-100 group cursor-pointer">
                <div class="text-3xl font-extrabold text-emerald-600 group-hover:scale-110 transition-transform">24/7
                </div>
                <div class="text-sm text-slate-500 font-medium">Auto Tracking</div>
            </div>
        </div>
    </section>

    <section id="features"
        class="py-24 px-6 bg-[#064e3b] rounded-[3rem] mx-4 md:mx-10 mb-20 text-white relative overflow-hidden reveal">
        <div
            class="absolute top-0 right-0 w-[600px] h-[600px] bg-emerald-500 rounded-full blur-[150px] opacity-10 pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
                <div class="max-w-xl">
                    <h2 class="text-3xl md:text-5xl font-bold mb-6 leading-tight">Fitur Utama untuk <br> Pejuang
                        Finansial</h2>
                    <p class="text-emerald-100/80 text-lg">Kami menggabungkan manajemen uang tradisional dengan elemen
                        psikologi game yang bikin ketagihan (dalam artian positif!).</p>
                </div>
                <a href="#"
                    class="text-emerald-300 font-bold hover:text-white transition flex items-center gap-2 group">
                    Lihat semua fitur
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-4 h-4 group-hover:translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-8 items-stretch">
                <div
                    class="group bg-[#0f5c46] border border-emerald-800 p-8 rounded-[2.5rem] hover:bg-[#0F9447] hover:scale-105 transition-all duration-300 cursor-pointer shadow-lg hover:shadow-emerald-900/50 flex flex-col items-center text-center h-full">
                    <div class="w-full h-32 flex items-center justify-center mb-6">
                        <img src="images/icon_loot.png" alt="Daily Loot Icon"
                            class="h-full w-auto object-contain filter drop-shadow-lg group-hover:scale-110 transition-transform duration-300"
                            onerror="this.src='https://placehold.co/200x200/0f5c46/white?text=Img+1'">
                    </div>
                    <h3 class="text-xl font-bold mb-3">Daily Loot & Streak</h3>
                    <p class="text-emerald-100/70 group-hover:text-white/90 text-sm leading-relaxed">Catat transaksi
                        selama 7 hari berturut-turut untuk mendapatkan "Legendary Loot".</p>
                </div>

                <div
                    class="group bg-[#0f5c46] p-8 rounded-[2.5rem] hover:scale-105 hover:shadow-2xl hover:shadow-indigo-900/50 transition-all duration-300 cursor-pointer transform md:-translate-y-4 flex flex-col items-center text-center h-full">
                    <div class="w-full h-32 flex items-center justify-center mb-6">
                        <img src="images/icon_boss.png" alt="Boss Battle Icon"
                            class="h-full w-auto object-contain filter drop-shadow-lg group-hover:scale-110 transition-transform duration-300"
                            onerror="this.src='https://placehold.co/200x200/4f46e5/white?text=Img+2'">
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-white">Boss Battle (Budget)</h3>
                    <p class="text-indigo-100 text-sm leading-relaxed">Tetapkan budget bulanan sebagai "Boss". Jika di
                        bawah budget, Boss kalah dan kamu naik level!</p>
                </div>

                <div
                    class="group bg-[#0f5c46] border border-emerald-800 p-8 rounded-[2.5rem] hover:bg-[#0F9447] hover:scale-105 transition-all duration-300 cursor-pointer shadow-lg hover:shadow-emerald-900/50 flex flex-col items-center text-center h-full">
                    <div class="w-full h-32 flex items-center justify-center mb-6">
                        <img src="images/icon_leaderboard.png" alt="Leaderboard Icon"
                            class="h-full w-auto object-contain filter drop-shadow-lg group-hover:scale-110 transition-transform duration-300"
                            onerror="this.src='https://placehold.co/200x200/0f5c46/white?text=Img+3'">
                    </div>
                    <h3 class="text-xl font-bold mb-3">Leaderboard</h3>
                    <p class="text-emerald-100/70 group-hover:text-white/90 text-sm leading-relaxed">Bandingkan skor
                        kedisiplinan finansialmu dengan teman di seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-20 px-6 max-w-4xl mx-auto reveal">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-4">Have a question? <br> We are here to
                answer.</h2>
        </div>

        <div class="space-y-4">
            <div
                class="border border-slate-200 rounded-2xl bg-white overflow-hidden hover:border-emerald-200 transition-colors">
                <button class="faq-btn flex justify-between items-center w-full p-6 text-left focus:outline-none">
                    <span class="text-lg font-bold text-slate-800">Apa itu Cuan Buddy?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content bg-slate-50/50">
                    <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                        Cuan Buddy adalah aplikasi manajemen keuangan yang menggunakan sistem gamifikasi. Kamu bisa
                        mencatat pengeluaran, membuat anggaran, dan mendapatkan XP serta naik level setiap kali kamu
                        berhasil menghemat uang.
                    </div>
                </div>
            </div>

            <div
                class="border border-slate-200 rounded-2xl bg-white overflow-hidden hover:border-emerald-200 transition-colors">
                <button class="faq-btn flex justify-between items-center w-full p-6 text-left focus:outline-none">
                    <span class="text-lg font-bold text-slate-800">Apakah data saya aman?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content bg-slate-50/50">
                    <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                        Sangat aman. Kami menggunakan enkripsi setara bank (AES-256) untuk melindungi data transaksi dan
                        informasi pribadi kamu. Kami tidak menjual data pengguna ke pihak ketiga.
                    </div>
                </div>
            </div>

            <div
                class="border border-slate-200 rounded-2xl bg-white overflow-hidden hover:border-emerald-200 transition-colors">
                <button class="faq-btn flex justify-between items-center w-full p-6 text-left focus:outline-none">
                    <span class="text-lg font-bold text-slate-800">Apakah aplikasi ini gratis?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content bg-slate-50/50">
                    <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                        Ya! Fitur dasar Cuan Buddy gratis selamanya. Kami juga menawarkan paket "Premium Hero" untuk
                        fitur analitik lanjutan dan kustomisasi karakter yang lebih banyak.
                    </div>
                </div>
            </div>

            <div
                class="border border-slate-200 rounded-2xl bg-white overflow-hidden hover:border-emerald-200 transition-colors">
                <button class="faq-btn flex justify-between items-center w-full p-6 text-left focus:outline-none">
                    <span class="text-lg font-bold text-slate-800">Bisa diakses di perangkat apa saja?</span>
                    <svg class="w-5 h-5 text-slate-500 transform transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="accordion-content bg-slate-50/50">
                    <div class="px-6 pb-6 text-slate-600 leading-relaxed">
                        Saat ini Cuan Buddy tersedia sebagai Website Responsif yang bisa diakses di Laptop, Tablet, dan
                        Smartphone (Android/iOS). Aplikasi native sedang dalam pengembangan.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-50 pt-20 pb-12 px-6 mt-20">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8 pb-12 border-b border-slate-200">
                <div class="flex items-center gap-2.5">
                    <div
                        class="w-8 h-8 bg-slate-900 rounded-lg flex items-center justify-center text-white font-bold text-sm italic">
                        CB</div>
                    <span class="font-bold text-slate-800 text-xl">Cuan Buddy</span>
                </div>
                <div class="flex gap-8">
                    <a href="#" class="text-slate-500 hover:text-[#0F9447] transition text-sm font-bold">Twitter</a>
                    <a href="#" class="text-slate-500 hover:text-[#0F9447] transition text-sm font-bold">Instagram</a>
                    <a href="#" class="text-slate-500 hover:text-[#0F9447] transition text-sm font-bold">Github</a>
                </div>
            </div>
            <div class="pt-8 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-500 font-medium">© 2026 Cuan Buddy. Level up your financial game.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-sm text-slate-400 hover:text-slate-600">Privacy Policy</a>
                    <a href="#" class="text-sm text-slate-400 hover:text-slate-600">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // 1. MOBILE MENU TOGGLE
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        const mobileLinks = document.querySelectorAll('.mobile-link');
        let isMenuOpen = false;

        btn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            if (isMenuOpen) {
                menu.classList.remove('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            } else {
                menu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });

        // Close menu when link is clicked
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                isMenuOpen = false;
                menu.classList.add('translate-y-[-100%]', 'opacity-0', 'pointer-events-none');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        });

        // 2. FAQ ACCORDION
        const faqBtns = document.querySelectorAll('.faq-btn');

        faqBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                const icon = btn.querySelector('svg');

                // Toggle logic
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove('rotate-180');
                    btn.classList.remove('text-emerald-600');
                } else {
                    // Close other open FAQs (Optional - remove this block if you want multiple open)
                    document.querySelectorAll('.accordion-content').forEach(el => el.style.maxHeight = null);
                    document.querySelectorAll('.faq-btn svg').forEach(el => el.classList.remove('rotate-180'));
                    document.querySelectorAll('.faq-btn').forEach(el => el.classList.remove('text-emerald-600'));

                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.classList.add('rotate-180');
                    btn.classList.add('text-emerald-600');
                }
            });
        });

        // 3. SCROLL REVEAL ANIMATION
        const revealElements = document.querySelectorAll('.reveal');

        const revealOnScroll = () => {
            const windowHeight = window.innerHeight;
            const elementVisible = 150;

            revealElements.forEach((reveal) => {
                const elementTop = reveal.getBoundingClientRect().top;
                if (elementTop < windowHeight - elementVisible) {
                    reveal.classList.add('active');
                }
            });
        }

        window.addEventListener('scroll', revealOnScroll);
        // Trigger once on load
        revealOnScroll();

        // 4. NAVBAR SCROLL EFFECT
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-sm');
                navbar.classList.replace('h-20', 'h-16');
            } else {
                navbar.classList.remove('shadow-sm');
                navbar.classList.replace('h-16', 'h-20');
            }
        });
    </script>
</body>

</html>
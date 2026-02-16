@vite(['resources/css/components/header.css'])
<header
    class="sticky top-0 z-30 flex h-[100px] w-full shrink-0 items-center justify-between border-b border-slate-200/50 bg-white/70 px-6 backdrop-blur-xl transition-all lg:px-10">

    {{-- 1. BAGIAN KIRI: Mobile Menu & Judul --}}
    <div class="flex items-center gap-4">
        {{-- Tombol Hamburger (Mobile Only) --}}
        <button class="text-slate-500 transition hover:text-primary lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        {{-- Logo Text (Mobile Only) --}}
        <span class="text-xl font-bold text-primary lg:hidden">Cuan Buddy</span>

        {{-- Judul Halaman (Desktop Only) --}}
        <h1 class="hidden text-2xl font-bold tracking-tight text-slate-800 lg:block">
            @yield('header_title', 'Dashboard')
        </h1>
    </div>

    {{-- 2. BAGIAN TENGAH: Global Search --}}
    <div class="hidden max-w-lg flex-1 px-8 md:flex">
        <div class="relative w-full text-slate-400 focus-within:text-primary transition-colors">
            <span class="absolute inset-y-0 left-0 flex items-center pl-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </span>
            {{-- Search Bar --}}
            <input type="text" name="search_query" id="global-search" readonly
                onfocus="this.removeAttribute('readonly');"
                class="h-12 w-full rounded-full border-none bg-slate-100/60 py-2 pl-12 pr-4 text-sm font-medium text-slate-600 placeholder:text-slate-400 focus:bg-white focus:ring-2 focus:ring-primary/10 outline-none transition-all shadow-sm ring-1 ring-transparent focus:shadow-md"
                placeholder="Cari transaksi, kategori, atau laporan...">
        </div>
    </div>

    {{-- 3. BAGIAN KANAN: Actions --}}
    <div class="flex items-center gap-3 sm:gap-5">

        {{-- Theme Toggle --}}
        <button
            class="hidden items-center justify-center rounded-full p-3 text-slate-400 transition hover:bg-slate-100 hover:text-yellow-500 sm:flex"
            title="Ganti Tema">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="5"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
            </svg>
        </button>

        {{-- Notifikasi --}}
        <button
            class="group relative flex items-center justify-center rounded-full p-3 text-slate-400 transition hover:bg-slate-100 hover:text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="group-hover:animate-swing">
                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
            </svg>
            <span class="absolute top-3 right-3.5 flex h-2.5 w-2.5">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex h-2.5 w-2.5 rounded-full border-2 border-white bg-red-500"></span>
            </span>
        </button>

        {{-- Separator --}}
        <div class="hidden h-12 w-px bg-slate-200 sm:block"></div>

        {{-- Profile Dropdown --}}
        <div class="relative group">
            <button
                class="flex items-center gap-3 rounded-full py-1 pl-1 pr-2 transition hover:bg-slate-100/50 focus:outline-none">
                <div
                    class="h-11 w-11 overflow-hidden rounded-full border-2 border-white shadow-sm ring-1 ring-slate-100">
                    <img src="https://ui-avatars.com/api/?name=Selena+Gomez&background=308156&color=fff" alt="User"
                        class="h-full w-full object-cover">
                </div>
                <div class="hidden text-left md:block">
                    <p class="text-sm font-bold text-slate-700">Selena</p>
                    <p class="text-xs font-medium text-slate-400">Member</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="hidden text-slate-400 transition-transform group-hover:rotate-180 md:block">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>

            {{-- Dropdown Menu --}}
            <div
                class="absolute right-0 z-50 mt-4 hidden w-60 animate-fade-in rounded-2xl border border-slate-100 bg-white/90 p-2 shadow-2xl backdrop-blur-xl group-hover:block">
                <div class="mb-2 border-b border-slate-100 px-4 py-3">
                    <p class="text-xs font-medium text-slate-400">Signed in as</p>
                    <p class="truncate text-sm font-bold text-slate-800">selena@gmail.com</p>
                </div>
                <div class="space-y-1">
                    <a href="#"
                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-primaryLight hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg> Profile Saya
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-600 transition hover:bg-primaryLight hover:text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg> Pengaturan
                    </a>
                </div>
                <div class="mt-2 border-t border-slate-100 p-1">
                    <a href="#"
                        class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-bold text-rose-600 transition hover:bg-rose-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg> Keluar
                    </a>
                </div>
            </div>
        </div>

    </div>
</header>
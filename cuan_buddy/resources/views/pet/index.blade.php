@extends('layouts.app')

@section('title', 'Pet & Goals - Cuan Buddy')
@section('header_title', 'Pet & Goals')

@section('content')
    <div x-data="petGameData()" class="pb-24"> {{-- Padding bottom extra agar tidak ketutup floating button --}}

        {{-- 1️⃣ HERO SECTION – PET STATUS (CENTER OF ATTENTION) --}}
        <div
            class="relative w-full bg-gradient-to-b from-emerald-50 to-white rounded-[2.5rem] border border-emerald-100 shadow-xl overflow-hidden p-6 sm:p-10 mb-8 text-center group">

            {{-- Background Elements --}}
            <div
                class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>
            <div
                class="absolute top-10 left-10 w-20 h-20 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob">
            </div>
            <div
                class="absolute top-10 right-10 w-20 h-20 bg-emerald-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000">
            </div>

            {{-- Top Stats (Streak & Health) --}}
            <div class="flex justify-between items-start relative z-10 mb-4">
                <div
                    class="flex flex-col items-center bg-white/60 backdrop-blur-md rounded-2xl p-2 border border-white shadow-sm">
                    <span class="text-2xl">🔥</span>
                    <span class="text-xs font-bold text-orange-600">7 Day</span>
                    <span class="text-[10px] text-slate-400">Streak</span>
                </div>
                <div
                    class="flex flex-col items-center bg-white/60 backdrop-blur-md rounded-2xl p-2 border border-white shadow-sm">
                    <span class="text-2xl">💖</span>
                    <span class="text-xs font-bold text-rose-600">Excellent</span>
                    <span class="text-[10px] text-slate-400">FinHealth</span>
                </div>
            </div>

            {{-- 🐶 PET ANIMATION AREA --}}
            <div class="relative z-20 flex flex-col items-center justify-center my-4">

                {{-- Mood Bubble --}}
                <div x-show="moodMessage" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                    class="mb-4 bg-white border-2 border-slate-100 px-4 py-2 rounded-2xl rounded-bl-none shadow-lg transform -translate-y-2">
                    <p class="text-sm font-bold text-slate-700" x-text="moodMessage"></p>
                </div>

                {{-- Avatar Pet (Klik untuk interaksi) --}}
                <div @click="petInteract()"
                    class="w-40 h-40 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full flex items-center justify-center text-7xl shadow-inner border-4 border-white ring-4 ring-emerald-50 cursor-pointer transition-transform duration-200 active:scale-95"
                    :class="isHappy ? 'animate-bounce' : ''">
                    <span x-text="petEmoji"></span>
                </div>

                {{-- Level Badge --}}
                <div
                    class="mt-[-20px] bg-slate-800 text-white px-4 py-1 rounded-full text-sm font-bold shadow-lg border-2 border-white z-30">
                    Level <span x-text="level"></span>
                </div>
            </div>

            {{-- 📊 XP BAR --}}
            <div class="max-w-md mx-auto mt-6 relative z-10">
                <div class="flex justify-between text-xs font-bold text-slate-500 mb-1">
                    <span>XP Progress</span>
                    <span x-text="`${currentXp} / ${targetXp} XP`"></span>
                </div>
                <div class="w-full bg-slate-200 rounded-full h-4 overflow-hidden border border-slate-100">
                    <div class="bg-gradient-to-r from-emerald-400 to-cyan-500 h-full rounded-full transition-all duration-1000 ease-out relative"
                        :style="`width: ${(currentXp / targetXp) * 100}%`">
                        <div class="absolute inset-0 bg-white/20 animate-[pulse_2s_infinite]"></div>
                    </div>
                </div>
                <p class="text-[10px] text-slate-400 mt-2">Kumpulkan 150 XP lagi untuk naik level!</p>
            </div>
        </div>

        {{-- 2️⃣ GOALS PROGRESS STRIP --}}
        <div class="mb-8">
            <div class="flex justify-between items-end mb-4 px-2">
                <h3 class="text-xl font-bold text-slate-800">Target Kamu</h3>
                <a href="#" class="text-xs font-bold text-primary hover:underline">Lihat Semua</a>
            </div>

            {{-- Horizontal Scroll Container --}}
            <div class="flex overflow-x-auto pb-4 gap-4 snap-x hide-scrollbar">

                {{-- Card 1: On Track --}}
                <div
                    class="snap-center min-w-[280px] bg-white p-5 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-xl">💻</div>
                        <span class="bg-emerald-100 text-emerald-700 text-[10px] font-bold px-2 py-1 rounded-full">On
                            Track</span>
                    </div>
                    <h4 class="font-bold text-slate-800">Macbook Air M3</h4>
                    <div class="flex justify-between text-xs text-slate-500 mt-1 mb-3">
                        <span>Rp 12.000.000 / 20jt</span>
                        <span>60%</span>
                    </div>
                    <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full rounded-full" style="width: 60%"></div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-[10px] font-bold text-slate-400 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            3 Bulan lagi
                        </span>
                        <span class="text-xs font-bold text-yellow-600">🏆 +500 XP</span>
                    </div>
                </div>

                {{-- Card 2: Danger (Near Deadline) --}}
                <div
                    class="snap-center min-w-[280px] bg-white p-5 rounded-3xl border border-rose-100 shadow-sm hover:shadow-md transition relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-rose-50 rounded-bl-full -mr-2 -mt-2 z-0"></div>
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-4">
                            <div class="w-10 h-10 rounded-xl bg-rose-100 flex items-center justify-center text-xl">🏝️</div>
                            <span
                                class="bg-rose-100 text-rose-700 text-[10px] font-bold px-2 py-1 rounded-full animate-pulse">Danger</span>
                        </div>
                        <h4 class="font-bold text-slate-800">Liburan Bali</h4>
                        <div class="flex justify-between text-xs text-slate-500 mt-1 mb-3">
                            <span>Rp 2.5jt / 5jt</span>
                            <span>50%</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                            <div class="bg-rose-500 h-full rounded-full" style="width: 50%"></div>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-[10px] font-bold text-rose-500 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                1 Minggu lagi!
                            </span>
                            <span class="text-xs font-bold text-yellow-600">🏆 +200 XP</span>
                        </div>
                    </div>
                </div>

                {{-- Card 3: Add New --}}
                <div class="snap-center min-w-[100px] flex items-center justify-center">
                    <button
                        class="w-14 h-14 rounded-full bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center text-slate-400 hover:bg-slate-200 hover:border-slate-400 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        {{-- 3️⃣ DAILY MISSIONS --}}
        <div class="mb-8">
            <h3 class="text-xl font-bold text-slate-800 mb-4 px-2">Misi Harian</h3>

            <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden p-2 space-y-2">

                {{-- Mission Item 1 --}}
                <label class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition cursor-pointer group">
                    <div class="relative flex items-center">
                        <input type="checkbox" @change="completeMission($el, 50)"
                            class="peer appearance-none w-6 h-6 border-2 border-slate-300 rounded-lg checked:bg-emerald-500 checked:border-emerald-500 transition cursor-pointer">
                        <svg class="absolute w-4 h-4 text-white pointer-events-none opacity-0 peer-checked:opacity-100 left-1 top-1 transition"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p
                            class="text-sm font-bold text-slate-700 group-hover:text-primary transition peer-checked:line-through peer-checked:text-slate-400">
                            Catat transaksi hari ini</p>
                    </div>
                    <span
                        class="text-xs font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-lg border border-yellow-100 group-hover:scale-110 transition">+50
                        XP</span>
                </label>

                {{-- Mission Item 2 --}}
                <label class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition cursor-pointer group">
                    <div class="relative flex items-center">
                        <input type="checkbox" @change="completeMission($el, 30)"
                            class="peer appearance-none w-6 h-6 border-2 border-slate-300 rounded-lg checked:bg-emerald-500 checked:border-emerald-500 transition cursor-pointer">
                        <svg class="absolute w-4 h-4 text-white pointer-events-none opacity-0 peer-checked:opacity-100 left-1 top-1 transition"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p
                            class="text-sm font-bold text-slate-700 group-hover:text-primary transition peer-checked:line-through peer-checked:text-slate-400">
                            Tidak overbudget hari ini</p>
                    </div>
                    <span
                        class="text-xs font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-lg border border-yellow-100 group-hover:scale-110 transition">+30
                        XP</span>
                </label>

                {{-- Mission Item 3 --}}
                <label class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition cursor-pointer group">
                    <div class="relative flex items-center">
                        <input type="checkbox" @change="completeMission($el, 20)"
                            class="peer appearance-none w-6 h-6 border-2 border-slate-300 rounded-lg checked:bg-emerald-500 checked:border-emerald-500 transition cursor-pointer">
                        <svg class="absolute w-4 h-4 text-white pointer-events-none opacity-0 peer-checked:opacity-100 left-1 top-1 transition"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                            stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p
                            class="text-sm font-bold text-slate-700 group-hover:text-primary transition peer-checked:line-through peer-checked:text-slate-400">
                            Review pengeluaran</p>
                    </div>
                    <span
                        class="text-xs font-bold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-lg border border-yellow-100 group-hover:scale-110 transition">+20
                        XP</span>
                </label>

            </div>
        </div>

        {{-- 4️⃣ ACHIEVEMENT MINI SECTION --}}
        <div class="mb-8">
            <h3 class="text-xl font-bold text-slate-800 mb-4 px-2">Koleksi Badge</h3>
            <div class="grid grid-cols-3 gap-3">

                {{-- Badge 1 --}}
                <div
                    class="bg-gradient-to-br from-yellow-50 to-white border border-yellow-100 p-3 rounded-2xl flex flex-col items-center text-center shadow-sm cursor-pointer hover:-translate-y-1 transition">
                    <div class="text-2xl mb-1">🥉</div>
                    <h4 class="text-xs font-bold text-slate-800 leading-tight">7 Day Streak</h4>
                    <p class="text-[10px] text-slate-400 mt-1">Unlocked</p>
                </div>

                {{-- Badge 2 --}}
                <div
                    class="bg-white border border-slate-100 p-3 rounded-2xl flex flex-col items-center text-center shadow-sm cursor-pointer hover:-translate-y-1 transition">
                    <div class="text-2xl mb-1">💰</div>
                    <h4 class="text-xs font-bold text-slate-800 leading-tight">1 Juta Pertama</h4>
                    <p class="text-[10px] text-slate-400 mt-1">Unlocked</p>
                </div>

                {{-- Badge 3 (Locked) --}}
                <div
                    class="bg-slate-50 border border-slate-100 p-3 rounded-2xl flex flex-col items-center text-center opacity-60 grayscale cursor-not-allowed">
                    <div class="text-2xl mb-1">🎯</div>
                    <h4 class="text-xs font-bold text-slate-600 leading-tight">Goal Hunter</h4>
                    <p class="text-[10px] text-slate-400 mt-1">Locked</p>
                </div>

            </div>
        </div>

        {{-- 5️⃣ QUICK ACTION BUTTONS (FLOATING DOCK) --}}
        <div class="fixed bottom-6 left-1/2 -translate-x-1/2 z-40">
            <div
                class="flex items-center gap-2 bg-slate-800/90 backdrop-blur-md p-2 rounded-full shadow-2xl border border-slate-700/50">

                <button
                    class="p-3 rounded-full bg-slate-700 text-white hover:bg-primary hover:text-white hover:scale-110 transition group relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span
                        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-[10px] font-bold text-white bg-black rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">Add
                        Goal</span>
                </button>

                <button
                    class="p-3 rounded-full bg-slate-700 text-white hover:bg-yellow-500 hover:text-white hover:scale-110 transition group relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span
                        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-[10px] font-bold text-white bg-black rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">Shop</span>
                </button>

                <button
                    class="p-3 rounded-full bg-slate-700 text-white hover:bg-blue-500 hover:text-white hover:scale-110 transition group relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                    <span
                        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-[10px] font-bold text-white bg-black rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">Stats</span>
                </button>

                <button
                    class="p-3 rounded-full bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-lg hover:scale-110 transition group relative animate-pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span
                        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-[10px] font-bold text-white bg-black rounded opacity-0 group-hover:opacity-100 transition whitespace-nowrap">Claim</span>
                </button>

            </div>
        </div>
        {{-- 5. ACHIEVEMENTS SECTION (Gamification) --}}
        <div class="mb-8">
            <div class="flex justify-between items-center mb-4 px-1">
                <h3 class="font-bold text-lg text-slate-800">Achievements Bulan Ini</h3>
                <a href="#" class="text-xs font-bold text-primary hover:underline">Lihat Semua</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                {{-- Badge 1: Unlocked --}}
                <div
                    class="bg-gradient-to-br from-yellow-50 to-white border border-yellow-100 p-4 rounded-2xl flex flex-col items-center text-center shadow-sm">
                    <div class="text-3xl mb-2 drop-shadow-md">👑</div>
                    <h4 class="text-sm font-bold text-slate-800">Hemat Champion</h4>
                    <p class="text-[10px] text-slate-500 mt-1">Saving rate > 30%</p>
                    <span
                        class="mt-2 bg-yellow-100 text-yellow-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Unlocked</span>
                </div>

                {{-- Badge 2: Unlocked --}}
                <div
                    class="bg-white border border-slate-100 p-4 rounded-2xl flex flex-col items-center text-center shadow-sm">
                    <div class="text-3xl mb-2">📝</div>
                    <h4 class="text-sm font-bold text-slate-800">Rajin Catat</h4>
                    <p class="text-[10px] text-slate-500 mt-1">Konsisten 7 hari</p>
                    <span
                        class="mt-2 bg-emerald-100 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded-full">Unlocked</span>
                </div>

                {{-- Badge 3: Locked --}}
                <div
                    class="bg-slate-50 border border-slate-100 p-4 rounded-2xl flex flex-col items-center text-center opacity-70 grayscale">
                    <div class="text-3xl mb-2">🥗</div>
                    <h4 class="text-sm font-bold text-slate-600">No Junk Food</h4>
                    <p class="text-[10px] text-slate-400 mt-1">0 Transaksi Fastfood</p>
                    <span
                        class="mt-2 bg-slate-200 text-slate-500 text-[10px] font-bold px-2 py-0.5 rounded-full">Locked</span>
                </div>

                {{-- Badge 4: Locked --}}
                <div
                    class="bg-slate-50 border border-slate-100 p-4 rounded-2xl flex flex-col items-center text-center opacity-70 grayscale">
                    <div class="text-3xl mb-2">🚀</div>
                    <h4 class="text-sm font-bold text-slate-600">To The Moon</h4>
                    <p class="text-[10px] text-slate-400 mt-1">Investasi > 1 Juta</p>
                    <span
                        class="mt-2 bg-slate-200 text-slate-500 text-[10px] font-bold px-2 py-0.5 rounded-full">Locked</span>
                </div>
            </div>
        </div>

    </div>

    {{-- SCRIPT ALPINE.JS (GAME LOGIC) --}}
    @push('scripts')
        <script>
            function petGameData() {
                return {
                    level: 5,
                    currentXp: 350,
                    targetXp: 500,
                    isHappy: false,
                    petEmoji: '🐱',
                    moodMessage: '',

                    // Logic saat checkbox misi diklik
                    completeMission(el, xpAmount) {
                        if (el.checked) {
                            // Tambah XP
                            this.currentXp += xpAmount;
                            this.isHappy = true;
                            this.petEmoji = '😽';
                            this.moodMessage = `Yay! +${xpAmount} XP!`;

                            // Efek suara (Opsional, placeholder)
                            // new Audio('success.mp3').play();

                            // Level Up Logic
                            if (this.currentXp >= this.targetXp) {
                                this.currentXp = this.currentXp - this.targetXp;
                                this.level++;
                                this.moodMessage = 'LEVEL UP! 🎉';
                                this.petEmoji = '🦁'; // Evolusi (Contoh)
                            }

                            // Reset mood setelah 2 detik
                            setTimeout(() => {
                                this.isHappy = false;
                                this.petEmoji = '🐱';
                                this.moodMessage = '';
                            }, 2000);
                        }
                    },

                    // Logic saat pet diklik
                    petInteract() {
                        this.isHappy = true;
                        this.petEmoji = '😻';
                        this.moodMessage = 'Meow! I love you! ❤️';
                        setTimeout(() => {
                            this.isHappy = false;
                            this.petEmoji = '🐱';
                            this.moodMessage = '';
                        }, 1500);
                    }
                }
            }
        </script>
    @endpush

@endsection
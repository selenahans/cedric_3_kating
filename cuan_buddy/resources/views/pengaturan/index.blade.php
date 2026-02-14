@extends('layouts.app')

@section('title', 'Pengaturan - Cuan Buddy')
@section('header_title', 'Pengaturan')
@section('container_style', 'max-w-5xl mr-auto')
@section('content')
<div x-data="settingsData()" class="pb-20">

    <div class="flex flex-col lg:flex-row gap-8">
        
        {{-- 🧭 LEFT SIDEBAR NAVIGATION (Desktop: Vertical, Mobile: Horizontal Scroll) --}}
        <aside class="w-full lg:w-64 flex-shrink-0">
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-2 sticky top-24 overflow-x-auto flex lg:flex-col gap-1 hide-scrollbar">
                
                {{-- Nav Items --}}
                <template x-for="item in menuItems" :key="item.id">
                    <button @click="activeTab = item.id"
                        :class="activeTab === item.id ? 'bg-primary/10 text-primary font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-50 font-medium'"
                        class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all whitespace-nowrap lg:w-full text-left group">
                        <span class="text-xl" x-text="item.icon"></span>
                        <span class="text-sm" x-text="item.label"></span>
                        {{-- Active Indicator (Desktop only) --}}
                        <div x-show="activeTab === item.id" class="hidden lg:block ml-auto w-1.5 h-1.5 rounded-full bg-primary"></div>
                    </button>
                </template>

                {{-- Danger Zone Link --}}
                <div class="hidden lg:block my-2 border-t border-slate-100"></div>
                <button @click="activeTab = 'danger'"
                    :class="activeTab === 'danger' ? 'bg-rose-50 text-rose-600 font-bold' : 'text-rose-500 hover:bg-rose-50 font-medium'"
                    class="flex items-center gap-3 px-4 py-3 rounded-2xl transition-all whitespace-nowrap lg:w-full text-left">
                    <span class="text-xl">🚨</span>
                    <span class="text-sm">Danger Zone</span>
                </button>
            </div>
        </aside>

        {{-- 📄 RIGHT CONTENT AREA --}}
        <main class="flex-1 min-w-0">
            
            {{-- 1️⃣ PROFILE SECTION --}}
            <div x-show="activeTab === 'profile'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-extrabold text-slate-800">Profil Kamu</h3>
                        <button @click="isEditing = !isEditing" class="text-sm font-bold text-primary hover:underline" x-text="isEditing ? 'Batal' : 'Edit Profil'"></button>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-6 mb-8">
                        <div class="relative group">
                            <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-slate-50 shadow-md">
                                <img :src="photoPreview" class="w-full h-full object-cover">
                            </div>
                            <label x-show="isEditing" class="absolute inset-0 bg-black/40 flex items-center justify-center rounded-full cursor-pointer opacity-0 group-hover:opacity-100 transition">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <input type="file" class="hidden" @change="updatePhoto">
                            </label>
                        </div>
                        <div class="text-center sm:text-left">
                            <h4 class="text-lg font-bold text-slate-800">Selena Gomez</h4>
                            <p class="text-slate-400 text-sm">Member sejak 2023</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Lengkap</label>
                            <input type="text" value="Selena Gomez" :disabled="!isEditing" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:opacity-70 disabled:cursor-not-allowed transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Username</label>
                            <input type="text" value="@selenag" :disabled="!isEditing" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:opacity-70 disabled:cursor-not-allowed transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Email</label>
                            <input type="email" value="selena@gmail.com" :disabled="!isEditing" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:opacity-70 disabled:cursor-not-allowed transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Timezone</label>
                            <select :disabled="!isEditing" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 font-bold focus:outline-none focus:ring-2 focus:ring-primary/20 disabled:opacity-70 disabled:cursor-not-allowed transition">
                                <option>(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                <option>(GMT+08:00) Singapore</option>
                            </select>
                        </div>
                    </div>

                    <div x-show="isEditing" class="mt-8 flex justify-end">
                        <button @click="saveSettings()" class="bg-primary text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition">Simpan Perubahan</button>
                    </div>
                </div>
            </div>

            {{-- 💰 2️⃣ FINANCIAL PREFERENCES --}}
            <div x-show="activeTab === 'financial'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-slate-800 mb-6">Preferensi Keuangan</h3>
                    
                    <div class="space-y-6">
                        {{-- Format Angka --}}
                        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <label class="block text-sm font-bold text-slate-700 mb-3">Format Angka</label>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <select x-model="numberFormat" class="flex-1 bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary transition">
                                    <option value="id">Indonesia (1.000.000,00)</option>
                                    <option value="en">International (1,000,000.00)</option>
                                </select>
                                <div class="flex-1 flex items-center justify-center bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-500 font-mono text-sm">
                                    Preview: <span class="font-bold text-slate-800 ml-2" x-text="numberFormat === 'id' ? 'Rp 1.500.000' : '$ 1,500,000'"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Budget Start --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Awal Siklus Budget</label>
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary transition">
                                    <option>Tanggal 1 (Awal Bulan)</option>
                                    <option>Tanggal 25 (Gajian)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Default Kategori</label>
                                <select class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:border-primary transition">
                                    <option>🍔 Makan & Minum</option>
                                    <option>🚗 Transportasi</option>
                                    <option>🛒 Belanja</option>
                                </select>
                            </div>
                        </div>

                        {{-- Auto Calc Toggle --}}
                        <div class="flex items-center justify-between p-4 rounded-2xl border border-slate-100 hover:bg-slate-50 transition">
                            <div>
                                <h4 class="font-bold text-slate-800">Auto-calculate Balance</h4>
                                <p class="text-xs text-slate-400 mt-1">Otomatis hitung sisa saldo dari pemasukan - pengeluaran</p>
                            </div>
                            {{-- Toggle Component --}}
                            <button @click="autoCalc = !autoCalc" 
                                :class="autoCalc ? 'bg-primary' : 'bg-slate-200'"
                                class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none">
                                <span :class="autoCalc ? 'translate-x-6' : 'translate-x-1'"
                                    class="inline-block h-4 w-4 transform rounded-full bg-white transition"></span>
                            </button>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end">
                        <button @click="saveSettings()" class="bg-primary text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition">Simpan</button>
                    </div>
                </div>
            </div>

            {{-- 🐾 3️⃣ PET & GAMIFICATION --}}
            <div x-show="activeTab === 'pet'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-slate-800 mb-6">Pet & Gamification</h3>

                    {{-- Pet Selection --}}
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-slate-700 mb-3">Pilih Pet Kamu</label>
                        <div class="grid grid-cols-3 gap-4">
                            <div @click="petType = 'cat'" :class="petType === 'cat' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-slate-200 hover:border-primary/50'" class="cursor-pointer border-2 rounded-2xl p-4 flex flex-col items-center transition">
                                <div class="text-4xl mb-2">🐱</div>
                                <span class="text-xs font-bold text-slate-700">Kucing</span>
                            </div>
                            <div @click="petType = 'dog'" :class="petType === 'dog' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-slate-200 hover:border-primary/50'" class="cursor-pointer border-2 rounded-2xl p-4 flex flex-col items-center transition">
                                <div class="text-4xl mb-2">🐶</div>
                                <span class="text-xs font-bold text-slate-700">Anjing</span>
                            </div>
                            <div @click="petType = 'fox'" :class="petType === 'fox' ? 'border-primary bg-primary/5 ring-1 ring-primary' : 'border-slate-200 hover:border-primary/50'" class="cursor-pointer border-2 rounded-2xl p-4 flex flex-col items-center transition">
                                <div class="text-4xl mb-2">🦊</div>
                                <span class="text-xs font-bold text-slate-700">Rubah</span>
                            </div>
                        </div>
                    </div>

                    {{-- Pet Name --}}
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Pet</label>
                        <div class="flex gap-4">
                            <div class="w-12 h-12 bg-slate-100 rounded-xl flex items-center justify-center text-2xl" x-text="petIcons[petType]"></div>
                            <input type="text" x-model="petName" class="flex-1 bg-slate-50 border border-slate-200 rounded-xl px-4 text-slate-700 font-bold focus:outline-none focus:border-primary transition">
                        </div>
                    </div>

                    {{-- Difficulty --}}
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Mode Difficulty</label>
                        <div class="flex p-1 bg-slate-100 rounded-xl">
                            <button @click="difficulty = 'relaxed'" :class="difficulty === 'relaxed' ? 'bg-white text-primary shadow-sm' : 'text-slate-500'" class="flex-1 py-2 rounded-lg text-xs font-bold transition">Relaxed</button>
                            <button @click="difficulty = 'balanced'" :class="difficulty === 'balanced' ? 'bg-white text-blue-600 shadow-sm' : 'text-slate-500'" class="flex-1 py-2 rounded-lg text-xs font-bold transition">Balanced</button>
                            <button @click="difficulty = 'hardcore'" :class="difficulty === 'hardcore' ? 'bg-white text-rose-600 shadow-sm' : 'text-slate-500'" class="flex-1 py-2 rounded-lg text-xs font-bold transition">Hardcore</button>
                        </div>
                        <p class="text-xs text-slate-400 mt-2 text-center" x-text="difficultyDesc[difficulty]"></p>
                    </div>

                    {{-- Toggles --}}
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-600">Show XP Progress Bar</span>
                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input type="checkbox" name="toggle" id="xp-toggle" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-slate-300 checked:right-0 checked:border-primary"/>
                                <label for="xp-toggle" class="toggle-label block overflow-hidden h-5 rounded-full bg-slate-300 cursor-pointer checked:bg-primary"></label>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-slate-600">Pet Sound Effects</span>
                            <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                <input type="checkbox" checked name="toggle" id="sound-toggle" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-slate-300 checked:right-0 checked:border-primary"/>
                                <label for="sound-toggle" class="toggle-label block overflow-hidden h-5 rounded-full bg-slate-300 cursor-pointer checked:bg-primary"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 🔔 4️⃣ NOTIFICATION --}}
            <div x-show="activeTab === 'notification'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-slate-800 mb-6">Notifikasi</h3>
                    <div class="space-y-0 divide-y divide-slate-50">
                        @foreach(['Budget Limit Warning', 'Bill Reminder (H-3)', 'Daily Financial Summary', 'Achievement Unlocked', 'Email Notification'] as $notif)
                        <div class="flex items-center justify-between py-4">
                            <span class="text-sm font-bold text-slate-700">{{ $notif }}</span>
                            <button @click="$el.classList.toggle('bg-primary'); $el.classList.toggle('bg-slate-200'); $el.firstElementChild.classList.toggle('translate-x-6'); $el.firstElementChild.classList.toggle('translate-x-1')" 
                                class="relative inline-flex h-6 w-11 items-center rounded-full bg-primary transition-colors focus:outline-none">
                                <span class="translate-x-6 inline-block h-4 w-4 transform rounded-full bg-white transition"></span>
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- 🔐 5️⃣ SECURITY --}}
            <div x-show="activeTab === 'security'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-slate-800 mb-6">Keamanan</h3>
                    
                    <div class="space-y-4 mb-8">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Password Saat Ini</label>
                            <input type="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Password Baru</label>
                                <input type="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Konfirmasi Password</label>
                                <input type="password" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:border-primary">
                            </div>
                        </div>
                        <button class="text-sm font-bold text-primary hover:underline">Ubah Password</button>
                    </div>

                    <div class="border-t border-slate-100 pt-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-bold text-slate-800">Two-Factor Authentication (2FA)</h4>
                                <p class="text-xs text-slate-400">Tambah keamanan ekstra saat login.</p>
                            </div>
                            <button class="relative inline-flex h-6 w-11 items-center rounded-full bg-slate-200 transition-colors focus:outline-none">
                                <span class="translate-x-1 inline-block h-4 w-4 transform rounded-full bg-white transition"></span>
                            </button>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-bold text-slate-800">Sesi Login</h4>
                                <p class="text-xs text-slate-400">Logout dari semua perangkat lain.</p>
                            </div>
                            <button class="px-4 py-2 border border-rose-200 text-rose-600 rounded-xl text-xs font-bold hover:bg-rose-50 transition">Logout All</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 🎨 6️⃣ APPEARANCE --}}
            <div x-show="activeTab === 'appearance'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-slate-800 mb-6">Tampilan</h3>
                    
                    <div class="mb-6">
                        <label class="block text-sm font-bold text-slate-700 mb-3">Tema</label>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="border-2 border-primary bg-primary/5 rounded-xl p-3 flex flex-col items-center cursor-pointer">
                                <div class="w-full h-8 bg-white border border-slate-200 rounded mb-2"></div>
                                <span class="text-xs font-bold text-slate-700">Light</span>
                            </div>
                            <div class="border-2 border-slate-100 hover:border-slate-300 rounded-xl p-3 flex flex-col items-center cursor-pointer">
                                <div class="w-full h-8 bg-slate-800 rounded mb-2"></div>
                                <span class="text-xs font-bold text-slate-700">Dark</span>
                            </div>
                            <div class="border-2 border-slate-100 hover:border-slate-300 rounded-xl p-3 flex flex-col items-center cursor-pointer">
                                <div class="w-full h-8 bg-gradient-to-r from-white to-slate-800 rounded mb-2 border border-slate-200"></div>
                                <span class="text-xs font-bold text-slate-700">Auto</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-3">Warna Aksen</label>
                        <div class="flex gap-3">
                            <button class="w-8 h-8 rounded-full bg-emerald-600 ring-2 ring-offset-2 ring-emerald-600"></button>
                            <button class="w-8 h-8 rounded-full bg-blue-600 hover:ring-2 ring-offset-2 ring-blue-600 transition"></button>
                            <button class="w-8 h-8 rounded-full bg-rose-500 hover:ring-2 ring-offset-2 ring-rose-500 transition"></button>
                            <button class="w-8 h-8 rounded-full bg-violet-600 hover:ring-2 ring-offset-2 ring-violet-600 transition"></button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 🗂 7️⃣ DATA & BACKUP (Combined with Danger in Sidebar link logic) --}}
            <div x-show="activeTab === 'data'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border border-slate-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-slate-800 mb-6">Data & Backup</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button class="flex items-center justify-center gap-2 p-4 rounded-xl border border-slate-200 hover:bg-slate-50 hover:border-primary/50 transition group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            <span class="font-bold text-slate-700">Export CSV</span>
                        </button>
                        <button class="flex items-center justify-center gap-2 p-4 rounded-xl border border-slate-200 hover:bg-slate-50 hover:border-primary/50 transition group">
                            <svg class="w-5 h-5 text-slate-400 group-hover:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            <span class="font-bold text-slate-700">Import Data</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- 🚨 8️⃣ DANGER ZONE --}}
            <div x-show="activeTab === 'danger'" x-transition.opacity.duration.300ms class="space-y-6">
                <div class="bg-white p-6 sm:p-8 rounded-[2rem] border-2 border-rose-100 shadow-sm">
                    <h3 class="text-xl font-extrabold text-rose-600 mb-2">Danger Zone</h3>
                    <p class="text-sm text-slate-500 mb-6">Tindakan di sini tidak dapat dibatalkan. Harap berhati-hati.</p>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-rose-50 rounded-xl border border-rose-100">
                            <div>
                                <h4 class="font-bold text-rose-700">Reset Progress Pet</h4>
                                <p class="text-xs text-rose-500">Kembalikan level pet ke 1.</p>
                            </div>
                            <button @click="confirmAction('Reset Pet')" class="px-4 py-2 bg-white border border-rose-200 text-rose-600 text-xs font-bold rounded-lg hover:bg-rose-100 transition">Reset</button>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-rose-50 rounded-xl border border-rose-100">
                            <div>
                                <h4 class="font-bold text-rose-700">Hapus Semua Data</h4>
                                <p class="text-xs text-rose-500">Hapus transaksi, budget, dan history.</p>
                            </div>
                            <button @click="confirmAction('Hapus Data')" class="px-4 py-2 bg-white border border-rose-200 text-rose-600 text-xs font-bold rounded-lg hover:bg-rose-100 transition">Hapus</button>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-rose-600 rounded-xl shadow-lg shadow-rose-200">
                            <div>
                                <h4 class="font-bold text-white">Hapus Akun Permanen</h4>
                                <p class="text-xs text-rose-100">Akun akan hilang selamanya.</p>
                            </div>
                            <button @click="confirmAction('Delete Account')" class="px-4 py-2 bg-rose-800 text-white text-xs font-bold rounded-lg hover:bg-rose-900 transition">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    {{-- MODAL CONFIRMATION --}}
    <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-sm" style="display: none;">
        <div class="bg-white rounded-3xl p-6 w-full max-w-sm shadow-2xl text-center">
            <div class="w-16 h-16 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">⚠️</div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Apakah Anda Yakin?</h3>
            <p class="text-sm text-slate-500 mb-4">Ketik <span class="font-bold text-rose-600 select-none">DELETE</span> untuk konfirmasi tindakan <span x-text="actionName" class="font-bold"></span>.</p>
            
            <input type="text" x-model="confirmText" placeholder="Type DELETE" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-center font-bold mb-4 focus:border-rose-500 outline-none">
            
            <div class="flex gap-3">
                <button @click="showModal = false; confirmText = ''" class="flex-1 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-100 transition">Batal</button>
                <button :disabled="confirmText !== 'DELETE'" :class="confirmText === 'DELETE' ? 'bg-rose-600 hover:bg-rose-700 shadow-lg shadow-rose-200' : 'bg-slate-300 cursor-not-allowed'" class="flex-1 py-3 rounded-xl font-bold text-white transition">Konfirmasi</button>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function settingsData() {
        return {
            activeTab: 'profile',
            isEditing: false,
            photoPreview: 'https://ui-avatars.com/api/?name=Selena+Gomez&background=308156&color=fff',
            numberFormat: 'id',
            autoCalc: true,
            petType: 'cat',
            petName: 'Mochi',
            petIcons: { cat: '🐱', dog: '🐶', fox: '🦊' },
            difficulty: 'balanced',
            difficultyDesc: {
                'relaxed': 'XP loss dimatikan. Cocok untuk pemula.',
                'balanced': 'Standard XP gain & loss. Tantangan wajar.',
                'hardcore': 'XP loss 2x lipat jika overbudget. Berani?'
            },
            showModal: false,
            actionName: '',
            confirmText: '',
            
            // Menu Items Configuration
            menuItems: [
                { id: 'profile', label: 'Profil', icon: '👤' },
                { id: 'financial', label: 'Keuangan', icon: '💰' },
                { id: 'pet', label: 'Pet & Game', icon: '🐾' },
                { id: 'notification', label: 'Notifikasi', icon: '🔔' },
                { id: 'security', label: 'Keamanan', icon: '🔐' },
                { id: 'appearance', label: 'Tampilan', icon: '🎨' },
                { id: 'data', label: 'Data & Backup', icon: '🗂' },
            ],

            updatePhoto(e) {
                const file = e.target.files[0];
                if (file) {
                    this.photoPreview = URL.createObjectURL(file);
                }
            },

            saveSettings() {
                // Simulasi Save
                this.isEditing = false;
                alert("Pengaturan berhasil disimpan! (Toast Placeholder)");
            },

            confirmAction(action) {
                this.actionName = action;
                this.showModal = true;
                this.confirmText = '';
            }
        }
    }
</script>
<style>
    /* Styling khusus toggle checkbox */
    .toggle-checkbox:checked {
        right: 0;
        border-color: #308156; /* Primary Color */
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #308156; /* Primary Color */
    }
</style>
@endpush
@endsection
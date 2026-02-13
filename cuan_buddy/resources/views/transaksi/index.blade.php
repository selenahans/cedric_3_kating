@extends('layouts.app')

@section('title', 'Transaksi - Cuan Buddy')
@section('header_title', 'Transaksi')

@section('content')
    <div x-data="{ 
            activeTab: 'income', 
            showModal: false, 
            modalType: 'create',
            transactionId: null 
        }">

        {{-- 1. PAGE HEADER & ACTIONS --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative z-10">

            {{-- KIRI: GABUNGAN PET + JUDUL --}}
            <div class="flex items-center gap-2 sm:gap-4 transition-all duration-300 ease-in-out">

                {{-- 🐱 PET COMPANION --}}
                <div x-data="{ hovered: false }" @mouseenter="hovered = true" @mouseleave="hovered = false"
                    class="flex items-center bg-white border border-slate-200 rounded-full p-1.5 shadow-sm transition-all duration-500 ease-out cursor-help group"
                    :class="hovered ? 'pr-6 gap-3 border-emerald-200 ring-2 ring-emerald-50' : 'pr-1.5 gap-0'">

                    <div
                        class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-2xl shadow-inner relative flex-shrink-0 z-10">
                        🐱
                        <div
                            class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full">
                        </div>
                    </div>

                    <div class="overflow-hidden transition-all duration-500 ease-out flex flex-col justify-center"
                        :class="hovered ? 'max-w-[200px] opacity-100 translate-x-0' : 'max-w-0 opacity-0 -translate-x-2'">
                        <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider whitespace-nowrap">
                            Buddy Mood
                        </span>
                        <p class="text-xs font-semibold text-slate-700 whitespace-nowrap leading-tight">
                            Cashflow aman bos! <br> <span class="text-slate-400 font-normal">Hemat pangkal kaya 🤑</span>
                        </p>
                    </div>
                </div>

                {{-- TEXT JUDUL --}}
                <div class="transition-transform duration-300">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Atur Keuangan</h2>
                    <p class="text-slate-500 font-medium text-sm mt-0.5">Pantau arus kas masuk dan keluar.</p>
                </div>
            </div>

            {{-- KANAN: ACTIONS --}}
            <div class="flex items-center gap-3 self-start md:self-auto">
                <div class="relative">
                    <select
                        class="appearance-none bg-white border border-slate-200 text-slate-600 py-2.5 pl-4 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 text-sm font-bold shadow-sm cursor-pointer hover:bg-slate-50 transition">
                        <option>Oktober 2023</option>
                        <option>September 2023</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                {{-- TOMBOL TAMBAH (Dinamis Sesuai Tab) --}}
                <button @click="showModal = true; modalType = 'create'"
                    class="flex items-center gap-2 bg-primary hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-bold shadow-lg shadow-emerald-200 transition transform hover:-translate-y-1 active:translate-y-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>

                    {{-- Text Tombol Berubah --}}
                    <span class="hidden sm:inline" x-text="activeTab === 'bills' ? 'Tambah Tagihan' : 'Tambah Baru'"></span>
                    <span class="sm:hidden">Baru</span>
                </button>
            </div>
        </div>


        {{-- 2. SUMMARY CARDS (Tetap Sama) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-emerald-50 to-white p-6 rounded-3xl border border-emerald-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                <div
                    class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition duration-500 group-hover:opacity-20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                        stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                </div>
                <p class="text-slate-500 text-sm font-semibold mb-1">Total Pemasukan</p>
                <h3 class="text-2xl font-bold text-emerald-600">Rp 12.500.000</h3>
            </div>

            <div
                class="bg-gradient-to-br from-rose-50 to-white p-6 rounded-3xl border border-rose-100 shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                <div
                    class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition duration-500 group-hover:opacity-20">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                        stroke="#f43f5e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline>
                        <polyline points="17 18 23 18 23 12"></polyline>
                    </svg>
                </div>
                <p class="text-slate-500 text-sm font-semibold mb-1">Total Pengeluaran</p>
                <h3 class="text-2xl font-bold text-rose-500">Rp 4.200.000</h3>
            </div>

            <div
                class="bg-primary text-white p-6 rounded-3xl shadow-xl shadow-emerald-100 relative overflow-hidden hover:scale-[1.02] transition-transform">
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-white/20 rounded-full blur-xl animate-pulse"></div>
                <p class="text-emerald-100 text-sm font-semibold mb-1">Sisa Saldo</p>
                <h3 class="text-2xl font-bold">Rp 8.300.000</h3>
            </div>
        </div>

        {{-- 3. TABS SWITCHER (CENTERED) --}}
        <div class="flex w-full justify-center mb-6"> {{-- Wrapper baru untuk menengahkan --}}

            <div
                class="bg-white p-1.5 rounded-2xl inline-flex border border-slate-200 shadow-sm overflow-x-auto max-w-full">

                {{-- Tab Income --}}
                <button @click="activeTab = 'income'"
                    :class="activeTab === 'income' ? 'bg-emerald-50 text-emerald-700 shadow-sm border border-emerald-100' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 flex items-center gap-2 whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 19V5" />
                        <path d="m5 12 7-7 7 7" />
                    </svg>
                    Pemasukan
                </button>

                {{-- Tab Expense --}}
                <button @click="activeTab = 'expense'"
                    :class="activeTab === 'expense' ? 'bg-rose-50 text-rose-700 shadow-sm border border-rose-100' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 flex items-center gap-2 whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14" />
                        <path d="m19 12-7 7-7-7" />
                    </svg>
                    Pengeluaran
                </button>

                {{-- Tab Bills --}}
                <button @click="activeTab = 'bills'"
                    :class="activeTab === 'bills' ? 'bg-blue-50 text-blue-700 shadow-sm border border-blue-100' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all duration-300 flex items-center gap-2 whitespace-nowrap">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="5" width="20" height="14" rx="2" />
                        <line x1="2" y1="10" x2="22" y2="10" />
                    </svg>
                    Tagihan (Bills)
                </button>
            </div>

        </div>

        {{-- 4. KONTEN (TABLES & BILLS LIST) --}}

        {{-- WRAPPER FOR TABLES (INCOME & EXPENSE) --}}
        <div x-show="activeTab === 'income' || activeTab === 'expense'"
            class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden transition-all">

            {{-- TABLE INCOME --}}
            <div x-show="activeTab === 'income'" x-transition.opacity.duration.300ms>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-slate-100 bg-slate-50/40 text-xs uppercase text-slate-500 font-bold tracking-wider">
                                <th class="p-5 pl-6">Tanggal</th>
                                <th class="p-5">Kategori</th>
                                <th class="p-5">Deskripsi</th>
                                <th class="p-5 text-right">Jumlah</th>
                                <th class="p-5 text-center pr-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="group hover:bg-slate-50/80 transition border-b border-slate-50 last:border-none">
                                <td class="p-5 pl-6 text-slate-500 font-medium">01 Okt 2023</td>
                                <td class="p-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-base shadow-sm group-hover:scale-110 transition">
                                            💰</div>
                                        <span class="font-bold text-slate-700">Gaji Bulanan</span>
                                    </div>
                                </td>
                                <td class="p-5 text-slate-500">Gaji bulan Oktober</td>
                                <td class="p-5 text-right font-extrabold text-emerald-600">+ Rp 10.000.000</td>
                                <td class="p-5 text-center pr-6">
                                    <div
                                        class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button @click="showModal = true; modalType = 'edit'"
                                            class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-emerald-50 transition"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg></button>
                                        <button
                                            class="p-2 rounded-lg text-slate-400 hover:text-rose-500 hover:bg-rose-50 transition"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- TABLE EXPENSE --}}
            <div x-show="activeTab === 'expense'" x-transition.opacity.duration.300ms>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-slate-100 bg-slate-50/40 text-xs uppercase text-slate-500 font-bold tracking-wider">
                                <th class="p-5 pl-6">Tanggal</th>
                                <th class="p-5">Kategori</th>
                                <th class="p-5">Deskripsi</th>
                                <th class="p-5 text-right">Jumlah</th>
                                <th class="p-5 text-center pr-6">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="group hover:bg-slate-50/80 transition border-b border-slate-50 last:border-none">
                                <td class="p-5 pl-6 text-slate-500 font-medium">02 Okt 2023</td>
                                <td class="p-5">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center text-base shadow-sm group-hover:scale-110 transition">
                                            🍔</div>
                                        <span class="font-bold text-slate-700">Makan Minum</span>
                                    </div>
                                </td>
                                <td class="p-5 text-slate-500">Makan siang kantor</td>
                                <td class="p-5 text-right font-extrabold text-rose-500">- Rp 45.000</td>
                                <td class="p-5 text-center pr-6">
                                    <div
                                        class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-2 rounded-lg text-slate-400 hover:text-primary hover:bg-emerald-50 transition"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg></button>
                                        <button
                                            class="p-2 rounded-lg text-slate-400 hover:text-rose-500 hover:bg-rose-50 transition"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- SECTION BILLS (NEW) --}}
        <div x-show="activeTab === 'bills'" x-transition.opacity.duration.300ms
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            {{-- Bill Item 1: Listrik --}}
            <div
                class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group relative overflow-hidden">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-xl">
                            ⚡</div>
                        <div>
                            <h4 class="font-bold text-slate-800">Listrik PLN</h4>
                            <p class="text-xs text-slate-500">Bulanan Rumah</p>
                        </div>
                    </div>
                    <span
                        class="bg-rose-50 text-rose-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Unpaid</span>
                </div>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-slate-400 mb-0.5">Jumlah Tagihan</p>
                        <p class="text-lg font-extrabold text-slate-800">Rp 300.000</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-rose-500 font-bold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Due 5 Feb
                        </p>
                    </div>
                </div>

                {{-- Action Button (Full Width) --}}
                <button
                    class="mt-4 w-full py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold text-sm hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-200 transition flex items-center justify-center gap-2 group-hover:border-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Mark as Paid
                </button>
            </div>

            {{-- Bill Item 2: Netflix --}}
            <div
                class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition group relative overflow-hidden">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl">
                            🎬</div>
                        <div>
                            <h4 class="font-bold text-slate-800">Netflix Premium</h4>
                            <p class="text-xs text-slate-500">Hiburan</p>
                        </div>
                    </div>
                    <span
                        class="bg-rose-50 text-rose-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase tracking-wide">Unpaid</span>
                </div>

                <div class="flex justify-between items-end">
                    <div>
                        <p class="text-xs text-slate-400 mb-0.5">Jumlah Tagihan</p>
                        <p class="text-lg font-extrabold text-slate-800">Rp 54.000</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-rose-500 font-bold flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Due 12 Feb
                        </p>
                    </div>
                </div>

                <button
                    class="mt-4 w-full py-2.5 rounded-xl border border-slate-200 text-slate-600 font-bold text-sm hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-200 transition flex items-center justify-center gap-2 group-hover:border-emerald-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Mark as Paid
                </button>
            </div>

            {{-- Bill Item 3: Empty State / Add New --}}
            <button @click="showModal = true; modalType = 'create'; activeTab = 'bills'"
                class="bg-slate-50 p-5 rounded-2xl border-2 border-dashed border-slate-200 hover:border-primary hover:bg-emerald-50/30 transition flex flex-col items-center justify-center gap-2 h-full min-h-[160px] group">
                <div
                    class="w-10 h-10 rounded-full bg-white border border-slate-200 flex items-center justify-center text-slate-400 group-hover:text-primary group-hover:border-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </div>
                <span class="text-sm font-bold text-slate-500 group-hover:text-primary">Tambah Tagihan Baru</span>
            </button>

        </div>

        {{-- 5. MODAL (UPDATED) --}}
        <div x-show="showModal" class="fixed inset-0 z-[60] overflow-y-auto" style="display: none;">
            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" @click="showModal = false"></div>
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">

                    {{-- Header Modal --}}
                    <div class="bg-white px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-800"
                            x-text="activeTab === 'bills' ? 'Tambah Tagihan Baru' : (modalType === 'create' ? 'Tambah Transaksi Baru' : 'Edit Transaksi')">
                        </h3>
                        <button @click="showModal = false" class="text-slate-400 hover:text-rose-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>

                    {{-- Form Content --}}
                    <div class="px-6 py-6 space-y-4">

                        {{-- Tab Type Selector (Hidden if adding Bills specifically, or make it dynamic) --}}
                        <div x-show="activeTab !== 'bills'">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Transaksi</label>
                            <div class="grid grid-cols-2 gap-3">
                                <button type="button" @click="activeTab = 'income'"
                                    :class="activeTab === 'income' ? 'bg-emerald-50 border-emerald-200 text-emerald-700 ring-2 ring-emerald-100' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="py-2 rounded-xl border font-bold text-sm transition">Pemasukan</button>
                                <button type="button" @click="activeTab = 'expense'"
                                    :class="activeTab === 'expense' ? 'bg-rose-50 border-rose-200 text-rose-700 ring-2 ring-rose-100' : 'bg-white border-slate-200 text-slate-500 hover:bg-slate-50'"
                                    class="py-2 rounded-xl border font-bold text-sm transition">Pengeluaran</button>
                            </div>
                        </div>

                        {{-- Input Fields --}}
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1"
                                x-text="activeTab === 'bills' ? 'Nama Tagihan' : 'Deskripsi'">Deskripsi</label>
                            <input type="text"
                                class="w-full rounded-xl border-slate-200 bg-slate-50 focus:border-primary focus:ring-primary/20 transition px-4 py-2 text-slate-700 outline-none"
                                placeholder="Contoh: Listrik, Gaji, dll...">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1"
                                x-text="activeTab === 'bills' ? 'Jatuh Tempo (Due Date)' : 'Tanggal'">Tanggal</label>
                            <input type="date"
                                class="w-full rounded-xl border-slate-200 bg-slate-50 focus:border-primary focus:ring-primary/20 transition px-4 py-2 text-slate-700 outline-none">
                        </div>

                        <div x-show="activeTab !== 'bills'">
                            <label class="block text-sm font-bold text-slate-700 mb-1">Kategori</label>
                            <select
                                class="w-full rounded-xl border-slate-200 bg-slate-50 focus:border-primary focus:ring-primary/20 transition px-4 py-2 text-slate-700 outline-none">
                                <option>Pilih Kategori...</option>
                                <option>Gaji</option>
                                <option>Makan & Minum</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-1">Jumlah (Rp)</label>
                            <div class="relative">
                                <span
                                    class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 font-bold">Rp</span>
                                <input type="number"
                                    class="w-full rounded-xl border-slate-200 bg-slate-50 focus:border-primary focus:ring-primary/20 transition pl-12 pr-4 py-2 text-slate-700 font-bold outline-none"
                                    placeholder="0">
                            </div>
                        </div>

                    </div>
                    <div class="bg-slate-50 px-6 py-4 flex justify-end gap-3 rounded-b-3xl">
                        <button @click="showModal = false"
                            class="px-5 py-2 rounded-xl text-slate-500 font-bold hover:bg-slate-200 transition">Batal</button>
                        <button
                            class="px-5 py-2 rounded-xl bg-primary text-white font-bold hover:bg-emerald-700 shadow-lg shadow-emerald-200 transition">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
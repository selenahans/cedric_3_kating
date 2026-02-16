@extends('layouts.app')

@section('title', 'Notifikasi - Cuan Buddy')
@section('header_title', 'Notifikasi')

@section('content')
<div x-data="notificationData()">

    {{-- 1. HERO SECTION: PET REACTION --}}
    <div class="relative bg-gradient-to-r from-indigo-500 to-purple-600 rounded-[2.5rem] p-8 text-white shadow-xl shadow-indigo-200 overflow-hidden mb-8 group">
        
        {{-- Background Pattern --}}
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
        <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
            {{-- Pet Avatar --}}
            <div class="relative">
                <div class="w-24 h-24 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-5xl shadow-inner border-2 border-white/30 animate-bounce-slow">
                    <span x-text="petReaction.emoji">🐱</span>
                </div>
                {{-- Badge Count --}}
                <div class="absolute -top-1 -right-1 bg-rose-500 text-white text-xs font-bold w-6 h-6 flex items-center justify-center rounded-full border-2 border-indigo-500 shadow-sm" x-show="unreadCount > 0" x-text="unreadCount"></div>
            </div>

            {{-- Text Reaction --}}
            <div class="text-center md:text-left flex-1">
                <h2 class="text-2xl font-bold mb-1" x-text="petReaction.title"></h2>
                <p class="text-indigo-100 text-sm leading-relaxed max-w-lg" x-text="petReaction.message"></p>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <button @click="markAllRead()" class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white px-4 py-2.5 rounded-xl text-sm font-bold transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8L10 16 6 12"/><path d="M22 2L12 12 8 8"/></svg>
                    <span class="hidden sm:inline">Tandai Dibaca</span>
                </button>
            </div>
        </div>
    </div>

    {{-- 2. FILTER TABS --}}
    <div class="flex gap-2 overflow-x-auto pb-4 mb-2 hide-scrollbar">
        <template x-for="tab in tabs" :key="tab.id">
            <button @click="activeFilter = tab.id"
                :class="activeFilter === tab.id ? 'bg-slate-800 text-white shadow-lg shadow-slate-200' : 'bg-white text-slate-500 border border-slate-200 hover:bg-slate-50'"
                class="px-5 py-2.5 rounded-xl text-sm font-bold transition-all whitespace-nowrap flex items-center gap-2">
                <span x-text="tab.icon"></span>
                <span x-text="tab.label"></span>
                <span x-show="tab.count > 0" class="bg-rose-500 text-white text-[10px] px-1.5 rounded-full ml-1" x-text="tab.count"></span>
            </button>
        </template>
    </div>

    {{-- 3. NOTIFICATION LIST --}}
    <div class="space-y-4">
        
        {{-- Empty State --}}
        <div x-show="filteredNotifications.length === 0" class="text-center py-20 bg-white rounded-[2rem] border border-slate-100 border-dashed">
            <div class="text-6xl mb-4 grayscale opacity-50">💤</div>
            <h3 class="text-lg font-bold text-slate-400">Sepi banget nih...</h3>
            <p class="text-slate-400 text-sm">Belum ada notifikasi baru untukmu.</p>
        </div>

        {{-- List Items --}}
        <template x-for="notif in filteredNotifications" :key="notif.id">
            <div class="group relative bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-all hover:-translate-y-1 cursor-pointer overflow-hidden"
                 :class="{'border-l-4 border-l-primary bg-primary/5': !notif.read}">
                
                <div class="flex items-start gap-4">
                    
                    {{-- Icon Box --}}
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-2xl shadow-sm flex-shrink-0"
                         :class="getTypeStyle(notif.type)">
                        <span x-text="getTypeIcon(notif.type)"></span>
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex justify-between items-start">
                            <h4 class="font-bold text-slate-800 text-sm md:text-base mb-1 truncate pr-4" x-text="notif.title"></h4>
                            <span class="text-[10px] font-bold text-slate-400 bg-slate-50 px-2 py-1 rounded-lg whitespace-nowrap" x-text="notif.time"></span>
                        </div>
                        <p class="text-slate-500 text-xs md:text-sm leading-relaxed line-clamp-2" x-text="notif.message"></p>
                        
                        {{-- Action Button (Optional per type) --}}
                        <div x-show="notif.action" class="mt-3">
                            <button class="text-xs font-bold text-primary hover:text-emerald-700 flex items-center gap-1 transition">
                                <span x-text="notif.action"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </button>
                        </div>
                    </div>

                    {{-- Read Indicator Dot --}}
                    <div x-show="!notif.read" class="w-2 h-2 rounded-full bg-primary mt-2"></div>
                </div>

                {{-- Hover Effect Background --}}
                <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/50 opacity-0 group-hover:opacity-100 pointer-events-none transition-opacity"></div>
            </div>
        </template>

    </div>

    {{-- Pagination (Load More) --}}
    <div class="mt-8 text-center" x-show="filteredNotifications.length > 0">
        <button class="text-sm font-bold text-slate-400 hover:text-slate-600 transition">Tampilkan Lebih Banyak</button>
    </div>

</div>

@push('scripts')
<script>
    function notificationData() {
        return {
            activeFilter: 'all',
            unreadCount: 3,
            
            // Data Dummy Notifikasi
            notifications: [
                { id: 1, type: 'warning', title: 'Budget Makan Hampir Habis!', message: 'Waduh! Sisa budget makan kamu tinggal Rp 50.000 nih. Kurangi jajan kopi mahal ya! ☕', time: 'Baru saja', read: false, action: 'Cek Budget' },
                { id: 2, type: 'achievement', title: 'Level Up! Si Hemat', message: 'Selamat! Kamu naik ke Level 5 karena berhasil menabung 20% dari pemasukan bulan ini. 🎉', time: '2 jam lalu', read: false, action: 'Lihat Badge' },
                { id: 3, type: 'bill', title: 'Tagihan Listrik Segera Jatuh Tempo', message: 'Jangan lupa bayar tagihan listrik Rp 300.000 sebelum tanggal 5 Februari.', time: 'Kemarin', read: false, action: 'Bayar Sekarang' },
                { id: 4, type: 'system', title: 'Fitur Baru: Mode Gelap 🌙', message: 'Mata lelah? Coba fitur Dark Mode baru kami di menu Pengaturan. Lebih nyaman buat begadang!', time: '2 hari lalu', read: true, action: 'Coba Sekarang' },
                { id: 5, type: 'info', title: 'Rekap Keuangan Mingguan', message: 'Total pengeluaranmu minggu ini: Rp 1.200.000. Cek detail lengkapnya di sini.', time: '3 hari lalu', read: true, action: 'Lihat Laporan' },
            ],

            tabs: [
                { id: 'all', label: 'Semua', icon: '📨', count: 0 },
                { id: 'unread', label: 'Belum Dibaca', icon: '🔴', count: 3 },
                { id: 'bill', label: 'Tagihan', icon: '⚡', count: 1 },
                { id: 'achievement', label: 'Prestasi', icon: '🏆', count: 0 },
            ],

            // Computed property simulation for filtering
            get filteredNotifications() {
                if (this.activeFilter === 'all') return this.notifications;
                if (this.activeFilter === 'unread') return this.notifications.filter(n => !n.read);
                return this.notifications.filter(n => n.type === this.activeFilter);
            },

            // Gamified Reaction based on top unread notification
            get petReaction() {
                const unread = this.notifications.find(n => !n.read);
                if (!unread) return { emoji: '😽', title: 'Semua Aman!', message: 'Tidak ada notifikasi baru. Kamu bisa santai sejenak, Buddy!' };
                
                switch(unread.type) {
                    case 'warning': return { emoji: '🙀', title: 'Waspada Bos!', message: 'Ada peringatan budget yang perlu perhatian kamu segera!' };
                    case 'bill': return { emoji: '😿', title: 'Ada Tagihan...', message: 'Jangan lupa bayar tagihan ya biar nggak kena denda.' };
                    case 'achievement': return { emoji: '😻', title: 'Wah Keren!', message: 'Kamu dapat pencapaian baru! Aku bangga banget sama kamu.' };
                    default: return { emoji: '🐱', title: 'Ada Kabar Baru', message: 'Cek notifikasi di bawah ini ya.' };
                }
            },

            // Helper for Styling
            getTypeStyle(type) {
                const styles = {
                    'warning': 'bg-orange-100 text-orange-600',
                    'bill': 'bg-rose-100 text-rose-600',
                    'achievement': 'bg-yellow-100 text-yellow-600',
                    'system': 'bg-slate-100 text-slate-600',
                    'info': 'bg-blue-100 text-blue-600',
                };
                return styles[type] || 'bg-slate-100 text-slate-600';
            },

            getTypeIcon(type) {
                const icons = {
                    'warning': '⚠️', 'bill': '🧾', 'achievement': '👑', 'system': '⚙️', 'info': 'ℹ️'
                };
                return icons[type] || '🔔';
            },

            markAllRead() {
                this.notifications.forEach(n => n.read = true);
                this.unreadCount = 0;
                this.tabs.find(t => t.id === 'unread').count = 0;
            }
        }
    }
</script>
<style>
    /* Slow Bounce Animation for Pet */
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(-5%); }
        50% { transform: translateY(5%); }
    }
    .animate-bounce-slow {
        animation: bounce-slow 3s infinite ease-in-out;
    }
</style>
@endpush
@endsection
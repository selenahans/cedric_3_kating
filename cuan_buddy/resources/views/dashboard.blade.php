@extends('layouts.app')

@section('title', 'Dashboard - Cuan Buddy')

@section('content')
    {{-- Section Hero / Welcome --}}
    <section class="bg-gradient-to-r from-[#308156] to-[#4ade80] rounded-[2rem] p-6 lg:p-10 text-white shadow-xl shadow-emerald-100 relative overflow-hidden hover-card">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl -mr-16 -mt-16"></div>
        
        <div class="flex flex-col lg:flex-row items-center justify-between gap-6 relative z-10">
            <div class="text-center lg:text-left">
                <h2 class="text-2xl lg:text-3xl font-bold mb-1">Halo, {{ Auth::user()->name }}! 👋</h2>
                <p class="text-emerald-50 opacity-90">Terus nabung biar <span class="font-bold text-yellow-200">Si Cermat</span> makin happy!</p>
            </div>

            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 flex items-center gap-5 min-w-[300px]">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg flex-shrink-0">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/cat-sitting-in-box-illustration-download-in-svg-png-gif-file-formats--kitty-kitten-animal-pet-pack-animals-illustrations-4753046.png" class="w-12 h-12 object-contain">
                </div>
                
                <div class="flex-1">
                    <div class="flex justify-between items-center mb-1">
                        <span class="font-bold text-lg">Level 5</span>
                        <span class="text-xs bg-yellow-400 text-yellow-900 px-2 py-0.5 rounded-full font-bold">Si Cermat</span>
                    </div>
                    <div class="w-full bg-emerald-900/30 h-3 rounded-full overflow-hidden">
                        <div class="bg-yellow-400 h-full rounded-full" style="width: 70%"></div>
                    </div>
                    <p class="text-xs mt-1 text-emerald-50 text-right">350 / 500 XP</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Statistik Ringkas --}}
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover-card">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                </div>
                <span class="text-slate-500 font-semibold text-sm">Pemasukan Bulan Ini</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800">Rp 12.500.000</h3>
            <p class="text-emerald-600 text-xs font-bold mt-2 flex items-center gap-1">
                <span class="bg-emerald-100 px-1.5 py-0.5 rounded text-emerald-700">+8%</span> dari bulan lalu
            </p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover-card">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center text-rose-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>
                </div>
                <span class="text-slate-500 font-semibold text-sm">Pengeluaran Bulan Ini</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800">Rp 4.200.000</h3>
            <p class="text-rose-600 text-xs font-bold mt-2 flex items-center gap-1">
                <span class="bg-rose-100 px-1.5 py-0.5 rounded text-rose-700">+2%</span> dari bulan lalu
            </p>
        </div>

        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover-card">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                </div>
                <span class="text-slate-500 font-semibold text-sm">Sisa Uang (Safe)</span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-800">Rp 8.300.000</h3>
            <p class="text-slate-400 text-xs mt-2">Aman untuk ditabung!</p>
        </div>

    </section>

    {{-- Section Chart & Goals --}}
    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-lg text-slate-800">Analitik Keuangan</h3>
                <select class="text-xs bg-slate-50 border border-slate-200 rounded-lg px-2 py-1 outline-none text-slate-600">
                    <option>6 Bulan Terakhir</option>
                    <option>Tahun Ini</option>
                </select>
            </div>
            <div id="financeChart" class="w-full h-80"></div>
        </div>

        <div class="lg:col-span-1 bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-lg text-slate-800">Target Utama</h3>
                <a href="#" class="text-xs font-bold text-primary hover:underline">Lihat Semua</a>
            </div>

            <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 mb-4 flex-1 flex flex-col justify-center">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-xl shadow-sm">💻</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Beli Macbook M3</h4>
                        <p class="text-xs text-slate-500">Target: Rp 20.000.000</p>
                    </div>
                </div>
                
                <div class="flex justify-between text-xs font-bold mb-2">
                    <span class="text-primary">Terkumpul: Rp 12.000.000</span>
                    <span class="text-slate-400">60%</span>
                </div>
                
                <div class="w-full bg-slate-200 h-3 rounded-full overflow-hidden">
                    <div class="bg-primary h-full rounded-full transition-all duration-1000" style="width: 60%"></div>
                </div>
                <p class="text-xs text-slate-400 mt-3 text-center">Kurang Rp 8.000.000 lagi, semangat!</p>
            </div>

            <div class="bg-yellow-50 p-4 rounded-xl border border-yellow-100 flex gap-3 items-start">
                 <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                 <p class="text-xs text-yellow-800 leading-relaxed">
                     Hemat kopi 3x minggu ini bisa nambahin tabunganmu <strong>Rp 150.000</strong> lho!
                 </p>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var options = {
                series: [{
                    name: 'Pemasukan',
                    data: [10, 12, 11, 14, 12, 16] // Data Dummy (Juta)
                }, {
                    name: 'Pengeluaran',
                    data: [5, 6, 5, 7, 4, 5] // Data Dummy (Juta)
                }],
                chart: {
                    type: 'area',
                    height: 300,
                    toolbar: { show: false },
                    fontFamily: 'Plus Jakarta Sans, sans-serif'
                },
                colors: ['#308156', '#f43f5e'], // Hijau & Merah
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.05,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 2 },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                    axisBorder: { show: false },
                    axisTicks: { show: false },
                    labels: { style: { colors: '#94a3b8' } }
                },
                yaxis: {
                    labels: { style: { colors: '#94a3b8' }, formatter: (value) => { return value + "Jt" } }
                },
                grid: {
                    borderColor: '#f1f5f9',
                    strokeDashArray: 4,
                },
                legend: { position: 'top', horizontalAlign: 'right' }
            };

            var chart = new ApexCharts(document.querySelector("#financeChart"), options);
            chart.render();
        });
    </script>
@endpush
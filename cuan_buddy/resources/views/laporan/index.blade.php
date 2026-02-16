@extends('layouts.app')

@section('title', 'Laporan - Cuan Buddy')
@section('header_title', 'Laporan Keuangan')

@section('content')
<div x-data="{ 
    period: 'monthly',
    showExportMenu: false
}">

{{-- 1. PAGE HEADER & FILTERS (Updated with Pet Pill) --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8 relative z-10">
        
        {{-- KIRI: GABUNGAN PET + JUDUL --}}
        <div class="flex items-center gap-2 sm:gap-4 transition-all duration-300 ease-in-out">
            
            {{-- 🐱 PET COMPANION (Dynamic Pill) --}}
            <div x-data="{ hovered: false }" 
                 @mouseenter="hovered = true" 
                 @mouseleave="hovered = false"
                 class="flex items-center bg-white border border-slate-200 rounded-full p-1.5 shadow-sm transition-all duration-500 ease-out cursor-help group"
                 :class="hovered ? 'pr-6 gap-3 border-emerald-200 ring-2 ring-emerald-50' : 'pr-1.5 gap-0'">
                
                {{-- Avatar --}}
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-2xl shadow-inner relative flex-shrink-0 z-10">
                    🐱
                    <div class="absolute bottom-0 right-0 w-3.5 h-3.5 bg-emerald-500 border-2 border-white rounded-full"></div>
                </div>

                {{-- Pesan (Expand on Hover) --}}
                <div class="overflow-hidden transition-all duration-500 ease-out flex flex-col justify-center"
                     :class="hovered ? 'max-w-[200px] opacity-100 translate-x-0' : 'max-w-0 opacity-0 -translate-x-2'">
                    <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider whitespace-nowrap">
                        Laporan Buddy
                    </span>
                    <p class="text-xs font-semibold text-slate-700 whitespace-nowrap leading-tight">
                        Datanya rapi banget! <br> <span class="text-slate-400 font-normal">Siap dianalisis bos 📊</span>
                    </p>
                </div>
            </div>

            {{-- TEXT JUDUL --}}
            <div class="transition-transform duration-300">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 tracking-tight">Analisis Keuangan</h2>
                <p class="text-slate-500 font-medium text-sm mt-0.5">Lihat seberapa sehat cashflow kamu.</p>
            </div>
        </div>

        {{-- KANAN: ACTIONS & FILTERS --}}
        <div class="flex items-center gap-3 self-start md:self-auto">
            
            {{-- Period Filter --}}
            <div class="relative bg-white rounded-xl border border-slate-200 shadow-sm p-1 flex">
                <button @click="period = 'weekly'" 
                    :class="period === 'weekly' ? 'bg-primary text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                    class="px-3 py-2 rounded-lg text-xs sm:text-sm font-bold transition-all">Mingguan</button>
                <button @click="period = 'monthly'" 
                    :class="period === 'monthly' ? 'bg-primary text-white shadow-md' : 'text-slate-500 hover:bg-slate-50'"
                    class="px-3 py-2 rounded-lg text-xs sm:text-sm font-bold transition-all">Bulanan</button>
            </div>

            {{-- Date Range Picker --}}
            <div class="relative hidden sm:block">
                <button class="flex items-center gap-2 bg-white border border-slate-200 text-slate-600 px-4 py-2.5 rounded-xl font-bold text-sm hover:bg-slate-50 transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    <span>Okt 2023</span>
                </button>
            </div>

            {{-- Export Button --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" @click.outside="open = false" class="flex items-center gap-2 bg-slate-800 text-white px-4 py-2.5 rounded-xl font-bold text-sm hover:bg-slate-700 transition shadow-lg shadow-slate-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                    <span class="hidden sm:inline">Export</span>
                </button>
                
                {{-- Dropdown Menu --}}
                <div x-show="open" x-transition class="absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-xl border border-slate-100 py-1 z-50" style="display: none;">
                    <a href="#" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 font-medium">Export PDF</a>
                    <a href="#" class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50 font-medium">Export Excel</a>
                </div>
            </div>
        </div>
    </div>

    {{-- 2. GAMIFICATION INSIGHT BANNER --}}
    <div class="mb-8 bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-100 rounded-2xl p-4 flex items-start sm:items-center gap-4 shadow-sm relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute right-0 top-0 w-64 h-64 bg-yellow-200/20 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none"></div>
        
        {{-- Pet Icon --}}
        <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-2xl shadow-sm border border-yellow-100 flex-shrink-0 z-10">
            🐱
        </div>
        
        {{-- Text --}}
        <div class="flex-1 z-10">
            <h4 class="font-bold text-slate-800 text-sm">Insight Buddy:</h4>
            <p class="text-sm text-slate-600 leading-relaxed">
                "Wih mantap! Kamu berhasil menabung <span class="font-bold text-emerald-600">25%</span> dari pendapatan bulan ini. Pet kamu naik ke <span class="font-bold text-yellow-600">Level 6</span>! 🎉 Pertahankan ya!"
            </p>
        </div>
    </div>

    {{-- 3. SUMMARY CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        {{-- Income --}}
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center">💰</div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pemasukan</span>
            </div>
            <h3 class="text-xl font-extrabold text-slate-800">Rp 12.500.000</h3>
            <p class="text-xs text-emerald-600 font-bold mt-1">↗ 8% dari bulan lalu</p>
        </div>

        {{-- Expense --}}
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-lg bg-rose-100 text-rose-600 flex items-center justify-center">💸</div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pengeluaran</span>
            </div>
            <h3 class="text-xl font-extrabold text-slate-800">Rp 4.200.000</h3>
            <p class="text-xs text-rose-600 font-bold mt-1">↗ 12% dari bulan lalu</p>
        </div>

        {{-- Net Income --}}
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">📈</div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Net Income</span>
            </div>
            <h3 class="text-xl font-extrabold text-slate-800">Rp 8.300.000</h3>
            <p class="text-xs text-slate-400 font-medium mt-1">Aman terkendali</p>
        </div>

        {{-- Saving Rate (Gamified) --}}
        <div class="bg-gradient-to-br from-purple-500 to-indigo-600 p-5 rounded-2xl shadow-lg text-white relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-3 opacity-10 group-hover:scale-110 transition">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path></svg>
            </div>
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs font-bold text-purple-200 uppercase tracking-wider">Saving Rate</span>
                <span class="bg-white/20 text-white text-[10px] px-1.5 py-0.5 rounded font-bold">Level Up!</span>
            </div>
            <h3 class="text-2xl font-extrabold mb-2">33.6%</h3>
            
            {{-- Progress Bar --}}
            <div class="w-full bg-black/20 h-1.5 rounded-full overflow-hidden">
                <div class="bg-yellow-400 h-full rounded-full" style="width: 75%"></div>
            </div>
            <p class="text-[10px] text-purple-100 mt-1">75% menuju badge "Hemat King"</p>
        </div>
    </div>

    {{-- 4. CHARTS SECTION --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        
        {{-- Line Chart (Cashflow) --}}
        <div class="lg:col-span-2 bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-lg text-slate-800">Cashflow Trend</h3>
                <span class="text-xs text-slate-400 font-medium">Bulan Ini</span>
            </div>
            <div id="cashflowChart" class="w-full h-80"></div>
        </div>

        {{-- Donut Chart (Categories) --}}
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="mb-6">
                <h3 class="font-bold text-lg text-slate-800">Top Pengeluaran</h3>
                <p class="text-xs text-slate-400">Berdasarkan Kategori</p>
            </div>
            <div id="categoryChart" class="w-full flex justify-center"></div>
            
            {{-- Custom Legend --}}
            <div class="mt-6 space-y-3">
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-rose-500"></span>
                        <span class="text-slate-600">Makan & Minum</span>
                    </div>
                    <span class="font-bold text-slate-800">45%</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                        <span class="text-slate-600">Transportasi</span>
                    </div>
                    <span class="font-bold text-slate-800">20%</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                        <span class="text-slate-600">Hiburan</span>
                    </div>
                    <span class="font-bold text-slate-800">35%</span>
                </div>
            </div>
        </div>
    </div>


    {{-- 6. DETAIL TABLE --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between gap-4 items-center">
            <h3 class="font-bold text-lg text-slate-800">Riwayat Transaksi</h3>
            
            <div class="flex gap-2 w-full sm:w-auto">
                <input type="text" placeholder="Cari transaksi..." class="w-full sm:w-64 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-primary">
                <button class="bg-slate-100 hover:bg-slate-200 text-slate-600 px-3 py-2 rounded-xl transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 text-xs uppercase text-slate-500 font-bold tracking-wider">
                        <th class="p-5 pl-6">Tanggal</th>
                        <th class="p-5">Kategori</th>
                        <th class="p-5">Catatan</th>
                        <th class="p-5 text-right pr-6">Nominal</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-50">
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-5 pl-6 text-slate-500">05 Okt 2023</td>
                        <td class="p-5"><span class="bg-rose-100 text-rose-700 px-2 py-1 rounded-lg text-xs font-bold">Makan</span></td>
                        <td class="p-5 text-slate-700">Makan Siang</td>
                        <td class="p-5 text-right pr-6 font-bold text-rose-500">- Rp 45.000</td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-5 pl-6 text-slate-500">01 Okt 2023</td>
                        <td class="p-5"><span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-lg text-xs font-bold">Gaji</span></td>
                        <td class="p-5 text-slate-700">Gaji Oktober</td>
                        <td class="p-5 text-right pr-6 font-bold text-emerald-600">+ Rp 10.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        {{-- Pagination Mockup --}}
        <div class="p-4 border-t border-slate-100 flex justify-center">
            <div class="flex gap-2">
                <button class="px-3 py-1 rounded-lg text-slate-400 hover:bg-slate-50 text-sm">Prev</button>
                <button class="px-3 py-1 rounded-lg bg-primary text-white text-sm font-bold shadow-md shadow-emerald-100">1</button>
                <button class="px-3 py-1 rounded-lg text-slate-500 hover:bg-slate-50 text-sm font-medium">2</button>
                <button class="px-3 py-1 rounded-lg text-slate-500 hover:bg-slate-50 text-sm font-medium">3</button>
                <button class="px-3 py-1 rounded-lg text-slate-600 hover:bg-slate-50 text-sm font-medium">Next</button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>

    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. CASHFLOW CHART (Line Chart)
        var cashflowOptions = {
            series: [{
                name: 'Pemasukan',
                data: [30, 40, 35, 50, 49, 60, 70]
            }, {
                name: 'Pengeluaran',
                data: [20, 30, 25, 40, 35, 45, 30]
            }],
            chart: {
                height: 320,
                type: 'area', // Area chart looks smoother than line
                toolbar: { show: false },
                fontFamily: 'Plus Jakarta Sans, sans-serif'
            },
            colors: ['#10b981', '#f43f5e'], // Emerald & Rose
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.4,
                    opacityTo: 0.05,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: { style: { colors: '#94a3b8' } }
            },
            yaxis: {
                labels: { style: { colors: '#94a3b8' } }
            },
            grid: {
                borderColor: '#f1f5f9',
                strokeDashArray: 4,
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            }
        };

        var cashflowChart = new ApexCharts(document.querySelector("#cashflowChart"), cashflowOptions);
        cashflowChart.render();


        // 2. CATEGORY CHART (Donut)
        var categoryOptions = {
            series: [45, 20, 35], // Data Persentase
            labels: ['Makan & Minum', 'Transportasi', 'Hiburan'],
            chart: {
                type: 'donut',
                height: 280,
                fontFamily: 'Plus Jakarta Sans, sans-serif'
            },
            colors: ['#f43f5e', '#3b82f6', '#eab308'], // Rose, Blue, Yellow
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            name: { show: false },
                            value: {
                                show: true,
                                fontSize: '24px',
                                fontWeight: 800,
                                color: '#1e293b',
                                formatter: function (val) {
                                    return val + "%"
                                }
                            },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total',
                                fontSize: '12px',
                                fontWeight: 600,
                                color: '#64748b',
                                formatter: function (w) {
                                    return "100%";
                                }
                            }
                        }
                    }
                }
            },
            dataLabels: { enabled: false },
            legend: { show: false }, // Kita pakai custom legend HTML biar lebih rapi
            stroke: { show: false }
        };

        var categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryOptions);
        categoryChart.render();
    });
</script>
@endpush
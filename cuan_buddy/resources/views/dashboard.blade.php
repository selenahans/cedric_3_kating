@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
            <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">
                + Add Transaction
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-sm mb-1">Total Balance</div>
                <div class="text-3xl font-bold text-emerald-600">Rp 12.500.000</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-sm mb-1">Expenses (Feb)</div>
                <div class="text-3xl font-bold text-red-500">Rp 2.100.000</div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 text-sm mb-1">Savings Goal</div>
                <div class="text-3xl font-bold text-blue-500">45%</div>
            </div>
        </div>

    </div>
@endsection
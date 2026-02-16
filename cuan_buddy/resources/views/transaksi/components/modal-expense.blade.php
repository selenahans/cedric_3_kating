{{--

<head>
    <link rel="stylesheet" href="{{ asset('css/components/modal.css') }}">
</head>
<div id="modalExpense" class="modal-overlay" x-show="showModal && activeTab === 'expense'" x-cloak
    @click.away="showModal = false">
    <div class="modal-content border-expense">
        <div class="modal-header">
            <h3>💸 Tambah Pengeluaran</h3>
            <span class="close-modal" onclick="closeModal('modalExpense')">&times;</span>
        </div>
        <form action="proses/tambah_pengeluaran.php" method="POST">
            <div class="form-group">
                <label>Nominal</label>
                <input type="number" name="amount" placeholder="Rp 0" required class="input-expense">
            </div>
            <div class="form-group">
                <label>Kategori Pengeluaran</label>
                <select name="category" required>
                    <option value="makanan">Food & Beverage</option>
                    <option value="transport">Transportasi</option>
                    <option value="hiburan">Hiburan/Self-Reward</option>
                    <option value="tagihan">Tagihan/Listrik</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <button type="submit" class="btn-submit bg-expense">Simpan Pengeluaran</button>
        </form>
    </div>
</div> --}}

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
            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400 font-bold">Rp</span>
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
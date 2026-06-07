<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            {{ __('Buat Transaksi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">FORMULIR PENYEWAAN BARU</h3>
                    <a href="{{ route('Transaksi.index') }}" class="text-sm text-slate hover:text-white transition-colors">Batal & Kembali</a>
                </div>
                
                <div class="p-8">
                    @if ($errors->any())
                        <div class="bg-red-900/30 border border-red-800 text-red-400 px-6 py-4 rounded-lg mb-6">
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('Transaksi.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <!-- Pelanggan ID -->
                            <div>
                                <label for="pelanggan_id" class="block text-sm font-medium text-gray-300 mb-2">Pilih Pelanggan</label>
                                <select name="pelanggan_id" id="pelanggan_id" class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                                    <option value="">-- Pilih Pelanggan --</option>
                                    @php $pelanggans = \App\Models\Pelanggan::all(); @endphp
                                    @foreach($pelanggans as $plg)
                                        <option value="{{ $plg->id }}" {{ old('pelanggan_id') == $plg->id ? 'selected' : '' }}>{{ $plg->nama ?? $plg->name }} - {{ $plg->nama_perusahaan ?? 'Individu' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Properti/Alat ID -->
                            <div>
                                <label for="properti_id" class="block text-sm font-medium text-gray-300 mb-2">Pilih Alat Berat</label>
                                <select name="properti_id" id="properti_id" class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                                    <option value="">-- Pilih Alat --</option>
                                    @php $alats = \App\Models\Alat_berat::where('status_sewa', 'Tersedia')->orWhere('status_sewa', 'tersedia')->get(); @endphp
                                    @foreach($alats as $alat)
                                        <option value="{{ $alat->id }}" {{ old('properti_id') == $alat->id ? 'selected' : '' }}>{{ $alat->nama_alat }} (Rp {{ number_format($alat->harga_sewa_per_hari, 0, ',', '.') }}/hari)</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tanggal Transaksi -->
                            <div>
                                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" value="{{ old('tanggal_transaksi', date('Y-m-d')) }}" 
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5 [color-scheme:dark]">
                            </div>

                            <!-- Jenis Transaksi -->
                            <div>
                                <label for="jenis_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Jenis Transaksi</label>
                                <select name="jenis_transaksi" id="jenis_transaksi" class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                                    <option value="Sewa Harian" {{ old('jenis_transaksi') == 'Sewa Harian' ? 'selected' : '' }}>Sewa Harian</option>
                                    <option value="Sewa Bulanan" {{ old('jenis_transaksi') == 'Sewa Bulanan' ? 'selected' : '' }}>Sewa Bulanan</option>
                                    <option value="Sewa Proyek" {{ old('jenis_transaksi') == 'Sewa Proyek' ? 'selected' : '' }}>Sewa Proyek (Lumpsum)</option>
                                </select>
                            </div>

                            <!-- Metode Transaksi -->
                            <div>
                                <label for="metode_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Metode Pembayaran <span class="text-red-500">*</span></label>
                                <select name="metode_transaksi" id="metode_transaksi" required class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                                    <option value="Transfer Bank" {{ old('metode_transaksi') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
                                    <option value="Cash / Tunai" {{ old('metode_transaksi') == 'Cash / Tunai' ? 'selected' : '' }}>Cash / Tunai</option>
                                    <option value="Kartu Kredit" {{ old('metode_transaksi') == 'Kartu Kredit' ? 'selected' : '' }}>Kartu Kredit</option>
                                    <option value="Termin / Invoice" {{ old('metode_transaksi') == 'Termin / Invoice' ? 'selected' : '' }}>Termin / Invoice</option>
                                </select>
                            </div>

                            <!-- Status Pembayaran -->
                            <div>
                                <label for="status_pembayaran" class="block text-sm font-medium text-gray-300 mb-2">Status Pembayaran</label>
                                <select name="status_pembayaran" id="status_pembayaran" class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                                    <option value="Menunggu Pembayaran" {{ old('status_pembayaran') == 'Menunggu Pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                    <option value="DP Dibayar" {{ old('status_pembayaran') == 'DP Dibayar' ? 'selected' : '' }}>DP / Sebagian Dibayar</option>
                                    <option value="Lunas" {{ old('status_pembayaran') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                </select>
                            </div>

                            <!-- Total Bayar -->
                            <div class="md:col-span-2">
                                <label for="total_bayar" class="block text-sm font-medium text-gray-300 mb-2">Total Estimasi Biaya (Rp)</label>
                                <input type="number" name="total_bayar" id="total_bayar" value="{{ old('total_bayar') }}" 
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5" placeholder="Contoh: 15000000">
                                <p class="mt-1 text-xs text-slate">Masukkan total angka tanpa titik atau koma.</p>
                            </div>

                        </div>

                        <div class="flex items-center justify-end pt-4 border-t border-gray-700 mt-6">
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-gold to-[#C7831A] text-dark font-bold rounded-lg hover:from-yellow-400 hover:to-gold transition-all shadow-[0_0_15px_rgba(245,166,35,0.3)]">
                                Buat Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

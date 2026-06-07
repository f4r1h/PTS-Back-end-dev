<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            {{ __('Edit Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">UBAH DATA TRANSAKSI</h3>
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

                    <form action="{{ route('Transaksi.update', $Transaksi->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- Pelanggan -->
                            <div>
                                <label for="pelanggan_id" class="block text-sm font-medium text-gray-300 mb-2">Pelanggan</label>
                                <select name="pelanggan_id" id="pelanggan_id"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="">-- Pilih Pelanggan --</option>
                                    @foreach(\App\Models\Pelanggan::all() as $plg)
                                        <option value="{{ $plg->id }}" {{ old('pelanggan_id', $Transaksi->pelanggan_id) == $plg->id ? 'selected' : '' }}>
                                            {{ $plg->nama }} — {{ $plg->nama_perusahaan ?? 'Individu' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Alat Berat (properti_id) -->
                            <div>
                                <label for="properti_id" class="block text-sm font-medium text-gray-300 mb-2">Alat Berat</label>
                                <select name="properti_id" id="properti_id"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="">-- Pilih Alat --</option>
                                    @foreach(\App\Models\Alat_berat::all() as $alat)
                                        <option value="{{ $alat->id }}" {{ old('properti_id', $Transaksi->properti_id) == $alat->id ? 'selected' : '' }}>
                                            {{ $alat->nama_alat }} ({{ $alat->status_sewa }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tanggal Transaksi -->
                            <div>
                                <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi"
                                    value="{{ old('tanggal_transaksi', \Carbon\Carbon::parse($Transaksi->tanggal_transaksi)->format('Y-m-d')) }}"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors [color-scheme:dark]">
                            </div>

                            <!-- Jenis Transaksi -->
                            <div>
                                <label for="jenis_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Jenis Transaksi</label>
                                <select name="jenis_transaksi" id="jenis_transaksi"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="Sewa Harian"   {{ old('jenis_transaksi', $Transaksi->jenis_transaksi) == 'Sewa Harian'   ? 'selected' : '' }}>Sewa Harian</option>
                                    <option value="Sewa Bulanan"  {{ old('jenis_transaksi', $Transaksi->jenis_transaksi) == 'Sewa Bulanan'  ? 'selected' : '' }}>Sewa Bulanan</option>
                                    <option value="Sewa Proyek"   {{ old('jenis_transaksi', $Transaksi->jenis_transaksi) == 'Sewa Proyek'   ? 'selected' : '' }}>Sewa Proyek (Lumpsum)</option>
                                </select>
                            </div>

                            <!-- Metode Transaksi -->
                            <div>
                                <label for="metode_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Metode Pembayaran <span class="text-red-500">*</span></label>
                                <select name="metode_transaksi" id="metode_transaksi" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="Transfer Bank"  {{ old('metode_transaksi', $Transaksi->metode_transaksi) == 'Transfer Bank'  ? 'selected' : '' }}>Transfer Bank</option>
                                    <option value="Cash / Tunai"   {{ old('metode_transaksi', $Transaksi->metode_transaksi) == 'Cash / Tunai'   ? 'selected' : '' }}>Cash / Tunai</option>
                                    <option value="Kartu Kredit"   {{ old('metode_transaksi', $Transaksi->metode_transaksi) == 'Kartu Kredit'   ? 'selected' : '' }}>Kartu Kredit</option>
                                    <option value="Termin / Invoice" {{ old('metode_transaksi', $Transaksi->metode_transaksi) == 'Termin / Invoice' ? 'selected' : '' }}>Termin / Invoice</option>
                                </select>
                            </div>

                            <!-- Status Pembayaran -->
                            <div>
                                <label for="status_pembayaran" class="block text-sm font-medium text-gray-300 mb-2">Status Pembayaran</label>
                                <select name="status_pembayaran" id="status_pembayaran"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="Menunggu Pembayaran" {{ old('status_pembayaran', $Transaksi->status_pembayaran) == 'Menunggu Pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                    <option value="DP Dibayar"          {{ old('status_pembayaran', $Transaksi->status_pembayaran) == 'DP Dibayar'          ? 'selected' : '' }}>DP / Sebagian Dibayar</option>
                                    <option value="Lunas"               {{ old('status_pembayaran', $Transaksi->status_pembayaran) == 'Lunas'               ? 'selected' : '' }}>Lunas</option>
                                </select>
                            </div>

                            <!-- Total Bayar -->
                            <div class="md:col-span-2">
                                <label for="total_bayar" class="block text-sm font-medium text-gray-300 mb-2">Total Biaya (Rp)</label>
                                <input type="number" name="total_bayar" id="total_bayar" value="{{ old('total_bayar', $Transaksi->total_bayar) }}"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                <p class="mt-1 text-xs text-slate">Masukkan total angka tanpa titik atau koma.</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-700 mt-6">
                            <a href="{{ route('Transaksi.index') }}" class="px-6 py-2.5 bg-dark-4 border border-gray-600 text-gray-300 font-semibold rounded-lg hover:bg-gray-700 transition-all">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-gold to-[#C7831A] text-[#0D0F14] font-bold rounded-lg hover:from-yellow-400 hover:to-gold transition-all shadow-[0_0_15px_rgba(245,166,35,0.3)]">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

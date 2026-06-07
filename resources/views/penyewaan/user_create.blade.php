<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Ajukan Penyewaan Baru
        </h2>
    </x-slot>

    <style>
        .radio-card-input:checked + .radio-card-div {
            border-color: var(--gold) !important;
            background-color: rgba(245, 166, 35, 0.05) !important;
        }
        .radio-card-input:checked + .radio-card-div .radio-dot {
            border-color: var(--gold) !important;
            background-color: var(--gold) !important;
        }
        .radio-card-input:checked + .radio-card-div .radio-dot-inner {
            background-color: #0D0F14 !important;
        }
    </style>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-3 border border-dark rounded-xl overflow-hidden shadow-[0_4px_25px_rgba(0,0,0,0.2)]">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex items-center justify-between">
                    <h3 class="font-condensed text-lg font-bold text-white tracking-wide">FORMULIR PENGAJUAN SEWA</h3>
                    <a href="{{ route('user.penyewaan') }}" class="text-xs text-gray-400 hover:text-white font-bold uppercase tracking-wider transition-colors flex items-center gap-1">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        Kembali
                    </a>
                </div>

                <div class="p-8">
                    @if($errors->any())
                        <div class="bg-red-955/40 border border-red-800/60 text-red-400 px-5 py-4 rounded-lg mb-6">
                            <ul class="list-disc list-inside text-sm space-y-1 font-medium">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.penyewaan.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Pilih Alat --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-3 uppercase tracking-wider">Pilih Alat Berat <span class="text-red-500">*</span></label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" id="alat-cards">
                                @forelse($availableAlat as $alat)
                                <label class="cursor-pointer group">
                                    <input type="radio" name="properti_id" value="{{ $alat->id }}"
                                        {{ (request('alat_id') == $alat->id || old('properti_id') == $alat->id) ? 'checked' : '' }}
                                        class="radio-card-input hidden" required>
                                    <div class="radio-card-div bg-dark-4 border-2 border-gray-700/60 rounded-xl p-5 flex flex-col justify-between h-full group-hover:border-gray-500 transition-all relative">
                                        <div class="flex justify-between items-start mb-3">
                                            <span class="font-condensed font-bold text-white text-lg tracking-wide group-hover:text-gold transition-colors">{{ $alat->nama_alat }}</span>
                                            <div class="radio-dot w-4 h-4 rounded-full border border-gray-600 flex items-center justify-center transition-all mt-1">
                                                <div class="radio-dot-inner w-1.5 h-1.5 rounded-full bg-transparent"></div>
                                            </div>
                                        </div>
                                        <div class="space-y-1 mb-4 text-xs text-gray-400">
                                            <div>Tipe: <span class="text-white font-medium">{{ $alat->tipe_alat ?? 'N/A' }}</span></div>
                                            <div>Kode: <span class="text-white font-medium">{{ $alat->kode_unit ?? '-' }}</span></div>
                                            <div>Kondisi: <span class="text-white font-medium">{{ $alat->kondisi ?? 'Baik' }}</span></div>
                                        </div>
                                        <div class="font-bold text-gold text-base pt-3 border-t border-gray-800">
                                            Rp {{ number_format($alat->harga_sewa_per_hari??0,0,',','.') }} 
                                            <span class="text-gray-500 font-normal text-xs">/ hari</span>
                                        </div>
                                    </div>
                                </label>
                                @empty
                                <div class="col-span-2 py-12 text-center text-gray-500 border border-dashed border-gray-700 rounded-xl">
                                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="mx-auto mb-3 opacity-30"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1z"/></svg>
                                    Tidak ada alat berat yang tersedia saat ini.
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-800/80">
                            {{-- Tanggal Mulai --}}
                            <div>
                                <label for="tanggal_mulai" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Mulai <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    value="{{ old('tanggal_mulai') }}" min="{{ date('Y-m-d') }}" required
                                    class="w-full bg-dark-4 border border-gray-700/60 rounded-xl focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-3 outline-none transition-all [color-scheme:dark]">
                            </div>

                            {{-- Tanggal Selesai --}}
                            <div>
                                <label for="tanggal_selesai" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Selesai <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                                    value="{{ old('tanggal_selesai') }}" required
                                    class="w-full bg-dark-4 border border-gray-700/60 rounded-xl focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-3 outline-none transition-all [color-scheme:dark]">
                            </div>

                            {{-- Jenis Transaksi --}}
                            <div>
                                <label for="jenis_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Jenis Sewa <span class="text-red-500">*</span></label>
                                <select name="jenis_transaksi" id="jenis_transaksi" required
                                    class="w-full bg-dark-4 border border-gray-700/60 rounded-xl focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-3 outline-none transition-all">
                                    <option value="Sewa Harian"  {{ old('jenis_transaksi')=='Sewa Harian' ?'selected':'' }}>Sewa Harian</option>
                                    <option value="Sewa Bulanan" {{ old('jenis_transaksi')=='Sewa Bulanan'?'selected':'' }}>Sewa Bulanan</option>
                                    <option value="Sewa Proyek"  {{ old('jenis_transaksi')=='Sewa Proyek' ?'selected':'' }}>Sewa Proyek (Lumpsum)</option>
                                </select>
                            </div>

                            {{-- Metode Pembayaran --}}
                            <div>
                                <label for="metode_transaksi" class="block text-sm font-medium text-gray-300 mb-2">Metode Pembayaran <span class="text-red-500">*</span></label>
                                <select name="metode_transaksi" id="metode_transaksi" required
                                    class="w-full bg-dark-4 border border-gray-700/60 rounded-xl focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-3 outline-none transition-all">
                                    <option value="Transfer Bank"    {{ old('metode_transaksi')=='Transfer Bank'?'selected':'' }}>Transfer Bank</option>
                                    <option value="Cash / Tunai"     {{ old('metode_transaksi')=='Cash / Tunai'?'selected':'' }}>Cash / Tunai</option>
                                    <option value="Kartu Kredit"     {{ old('metode_transaksi')=='Kartu Kredit'?'selected':'' }}>Kartu Kredit</option>
                                    <option value="Termin / Invoice" {{ old('metode_transaksi')=='Termin / Invoice'?'selected':'' }}>Termin / Invoice</option>
                                </select>
                            </div>
                        </div>

                        {{-- Estimasi Biaya Preview --}}
                        <div id="estimasi-panel" class="hidden bg-gradient-to-br from-dark-3 to-dark-4 border border-gold/30 rounded-xl p-6 shadow-[0_4px_20px_rgba(245,166,35,0.03)] space-y-2">
                            <div class="flex items-center gap-2 text-gold">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                <p class="text-xs uppercase font-bold tracking-widest">Estimasi Total Biaya</p>
                            </div>
                            <p id="estimasi-text" class="font-condensed text-3xl font-extrabold text-gold">Rp 0</p>
                            <p id="estimasi-detail" class="text-xs text-gray-400 font-medium"></p>
                        </div>

                        <div class="flex justify-between items-center pt-5 border-t border-gray-800">
                            <a href="{{ route('user.penyewaan') }}" class="px-5 py-2.5 bg-dark-4 border border-gray-700 text-gray-300 font-semibold rounded-lg hover:bg-gray-700 transition-all text-sm">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-gold to-[#C7831A] text-[#0D0F14] font-extrabold rounded-lg hover:from-yellow-400 hover:to-gold transition-all shadow-[0_4px_15px_rgba(245,166,35,0.2)] text-sm">
                                Kirim Pengajuan Sewa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Harga per alat
        const harga = {
            @foreach($availableAlat as $alat)
            {{ $alat->id }}: {{ $alat->harga_sewa_per_hari ?? 0 }},
            @endforeach
        };

        function hitungEstimasi() {
            const selectedAlat = document.querySelector('input[name="properti_id"]:checked');
            const mulai   = document.getElementById('tanggal_mulai').value;
            const selesai = document.getElementById('tanggal_selesai').value;

            if (!selectedAlat || !mulai || !selesai) return;

            const d1 = new Date(mulai), d2 = new Date(selesai);
            const durasi = Math.ceil((d2 - d1) / (1000 * 60 * 60 * 24));
            if (durasi <= 0) return;

            const hargaPerHari = harga[selectedAlat.value] || 0;
            const total = durasi * hargaPerHari;

            const panel = document.getElementById('estimasi-panel');
            panel.classList.remove('hidden');
            document.getElementById('estimasi-text').textContent = 'Rp ' + total.toLocaleString('id-ID');
            document.getElementById('estimasi-detail').textContent = durasi + ' hari × Rp ' + hargaPerHari.toLocaleString('id-ID') + '/hari';
        }

        document.querySelectorAll('input[name="properti_id"]').forEach(r => r.addEventListener('change', hitungEstimasi));
        document.getElementById('tanggal_mulai').addEventListener('change', function() {
            document.getElementById('tanggal_selesai').min = this.value;
            hitungEstimasi();
        });
        document.getElementById('tanggal_selesai').addEventListener('change', hitungEstimasi);
    </script>
</x-app-layout>

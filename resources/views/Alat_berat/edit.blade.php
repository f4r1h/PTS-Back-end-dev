<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            {{ __('Edit Alat Berat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">UBAH DATA ALAT BERAT</h3>
                    <a href="{{ route('Alat_berat.index') }}" class="text-sm text-slate hover:text-white transition-colors">Batal & Kembali</a>
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

                    <form action="{{ route('Alat_berat.update', $Alat_berat->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Alat -->
                            <div>
                                <label for="nama_alat" class="block text-sm font-medium text-gray-300 mb-2">Nama Alat Berat <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_alat" id="nama_alat" value="{{ old('nama_alat', $Alat_berat->nama_alat) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Kode Unit -->
                            <div>
                                <label for="kode_unit" class="block text-sm font-medium text-gray-300 mb-2">Kode Alat / Unit <span class="text-red-500">*</span></label>
                                <input type="text" name="kode_unit" id="kode_unit" value="{{ old('kode_unit', $Alat_berat->kode_unit) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Tipe Alat -->
                            <div>
                                <label for="tipe_alat" class="block text-sm font-medium text-gray-300 mb-2">Tipe / Kategori</label>
                                <input type="text" name="tipe_alat" id="tipe_alat" value="{{ old('tipe_alat', $Alat_berat->tipe_alat) }}"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors" placeholder="Contoh: Excavator, Dozer">
                            </div>

                            <!-- Harga Sewa -->
                            <div>
                                <label for="harga_sewa_per_hari" class="block text-sm font-medium text-gray-300 mb-2">Harga Sewa per Hari (Rp)</label>
                                <input type="number" name="harga_sewa_per_hari" id="harga_sewa_per_hari" value="{{ old('harga_sewa_per_hari', $Alat_berat->harga_sewa_per_hari) }}"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Kondisi -->
                            <div>
                                <label for="kondisi" class="block text-sm font-medium text-gray-300 mb-2">Kondisi <span class="text-red-500">*</span></label>
                                <select name="kondisi" id="kondisi" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="Baik" {{ old('kondisi', $Alat_berat->kondisi) == 'Baik' ? 'selected' : '' }}>Baik / Layak Jalan</option>
                                    <option value="Perlu Perbaikan" {{ old('kondisi', $Alat_berat->kondisi) == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                                    <option value="Rusak" {{ old('kondisi', $Alat_berat->kondisi) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                </select>
                            </div>

                            <!-- Status Sewa -->
                            <div>
                                <label for="status_sewa" class="block text-sm font-medium text-gray-300 mb-2">Status Sewa <span class="text-red-500">*</span></label>
                                <select name="status_sewa" id="status_sewa" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="Tersedia" {{ old('status_sewa', $Alat_berat->status_sewa) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                    <option value="Disewa" {{ old('status_sewa', $Alat_berat->status_sewa) == 'Disewa' ? 'selected' : '' }}>Disewa</option>
                                    <option value="Maintenance" {{ old('status_sewa', $Alat_berat->status_sewa) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                                </select>
                            </div>

                            <!-- Lokasi -->
                            <div class="md:col-span-2">
                                <label for="lokasi_sekarang" class="block text-sm font-medium text-gray-300 mb-2">Lokasi Sekarang</label>
                                <input type="text" name="lokasi_sekarang" id="lokasi_sekarang" value="{{ old('lokasi_sekarang', $Alat_berat->lokasi_sekarang) }}"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors" placeholder="Contoh: Pool Jakarta / Proyek A">
                            </div>

                            <!-- Spesifikasi -->
                            <div class="md:col-span-2">
                                <label for="spesifikasi" class="block text-sm font-medium text-gray-300 mb-2">Spesifikasi Detail</label>
                                <textarea name="spesifikasi" id="spesifikasi" rows="4"
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">{{ old('spesifikasi', $Alat_berat->spesifikasi) }}</textarea>
                            </div>

                            <!-- Foto -->
                            <div class="md:col-span-2">
                                <label for="foto_alat" class="block text-sm font-medium text-gray-300 mb-2">Foto / URL Gambar <span class="text-red-500">*</span></label>
                                <input type="text" name="foto_alat" id="foto_alat" value="{{ old('foto_alat', $Alat_berat->foto_alat) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors" placeholder="Path foto atau URL gambar">
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-700 mt-6">
                            <a href="{{ route('Alat_berat.index') }}" class="px-6 py-2.5 bg-dark-4 border border-gray-600 text-gray-300 font-semibold rounded-lg hover:bg-gray-700 transition-all">
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

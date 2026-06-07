<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            {{ __('Edit Data Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">UBAH DATA PELANGGAN</h3>
                    <a href="{{ route('Pelanggan.index') }}" class="text-sm text-slate hover:text-white transition-colors">Batal & Kembali</a>
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

                    <form action="{{ route('Pelanggan.update', $Pelanggan->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama', $Pelanggan->nama) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Jenis -->
                            <div>
                                <label for="jenis" class="block text-sm font-medium text-gray-300 mb-2">Jenis Pelanggan <span class="text-red-500">*</span></label>
                                <select name="jenis" id="jenis" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                                    <option value="Individu" {{ old('jenis', $Pelanggan->jenis) == 'Individu' ? 'selected' : '' }}>Individu (Perorangan)</option>
                                    <option value="Perusahaan" {{ old('jenis', $Pelanggan->jenis) == 'Perusahaan' ? 'selected' : '' }}>Perusahaan (B2B)</option>
                                </select>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Aktif <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email', $Pelanggan->email) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Nomor Telepon -->
                            <div>
                                <label for="nomer_telpon" class="block text-sm font-medium text-gray-300 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                                <input type="text" name="nomer_telpon" id="nomer_telpon" value="{{ old('nomer_telpon', $Pelanggan->nomer_telpon) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Nomor Identitas -->
                            <div>
                                <label for="nomer_identitas" class="block text-sm font-medium text-gray-300 mb-2">Nomor Identitas (KTP/NPWP) <span class="text-red-500">*</span></label>
                                <input type="text" name="nomer_identitas" id="nomer_identitas" value="{{ old('nomer_identitas', $Pelanggan->nomer_identitas) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Nama Perusahaan -->
                            <div>
                                <label for="nama_perusahaan" class="block text-sm font-medium text-gray-300 mb-2">Nama Perusahaan <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ old('nama_perusahaan', $Pelanggan->nama_perusahaan) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Penanggungjawab -->
                            <div>
                                <label for="penanggungjawab" class="block text-sm font-medium text-gray-300 mb-2">Penanggung Jawab <span class="text-red-500">*</span></label>
                                <input type="text" name="penanggungjawab" id="penanggungjawab" value="{{ old('penanggungjawab', $Pelanggan->penanggungjawab) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">
                            </div>

                            <!-- Tanggal Daftar -->
                            <div>
                                <label for="tanggal_daftar" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Daftar <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_daftar" id="tanggal_daftar"
                                    value="{{ old('tanggal_daftar', \Carbon\Carbon::parse($Pelanggan->tanggal_daftar)->format('Y-m-d')) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors [color-scheme:dark]">
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-300 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                                <textarea name="alamat" id="alamat" rows="3" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-2 focus:ring-gold focus:border-gold text-white px-4 py-2.5 outline-none transition-colors">{{ old('alamat', $Pelanggan->alamat) }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-700 mt-6">
                            <a href="{{ route('Pelanggan.index') }}" class="px-6 py-2.5 bg-dark-4 border border-gray-600 text-gray-300 font-semibold rounded-lg hover:bg-gray-700 transition-all">
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

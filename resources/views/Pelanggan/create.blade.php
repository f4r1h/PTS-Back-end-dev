<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            {{ __('Tambah Data Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">FORMULIR PENDAFTARAN PELANGGAN</h3>
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

                    <form action="{{ route('Pelanggan.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Lengkap / Name (to match validation) -->
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-300 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama', request('nama')) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                            </div>

                            <!-- Jenis -->
                            <div>
                                <label for="jenis" class="block text-sm font-medium text-gray-300 mb-2">Jenis Pelanggan <span class="text-red-500">*</span></label>
                                <select name="jenis" id="jenis" required class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                                    <option value="Individu" {{ old('jenis') == 'Individu' ? 'selected' : '' }}>Individu (Perorangan)</option>
                                    <option value="Perusahaan" {{ old('jenis') == 'Perusahaan' ? 'selected' : '' }}>Perusahaan (B2B)</option>
                                </select>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email Aktif <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email', request('email')) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                            </div>

                            <!-- No Telepon -->
                            <div>
                                <label for="nomer_telpon" class="block text-sm font-medium text-gray-300 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                                <input type="text" name="nomer_telpon" id="nomer_telpon" value="{{ old('nomer_telpon') }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                            </div>

                            <!-- No Identitas -->
                            <div>
                                <label for="nomer_identitas" class="block text-sm font-medium text-gray-300 mb-2">Nomor Identitas (KTP/NPWP) <span class="text-red-500">*</span></label>
                                <input type="text" name="nomer_identitas" id="nomer_identitas" value="{{ old('nomer_identitas') }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                            </div>

                            <!-- Nama Perusahaan -->
                            <div>
                                <label for="nama_perusahaan" class="block text-sm font-medium text-gray-300 mb-2">Nama Perusahaan <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ old('nama_perusahaan', request('nama_perusahaan', 'Pribadi')) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                            </div>

                            <!-- Penanggungjawab -->
                            <div>
                                <label for="penanggungjawab" class="block text-sm font-medium text-gray-300 mb-2">Penanggung Jawab <span class="text-red-500">*</span></label>
                                <input type="text" name="penanggungjawab" id="penanggungjawab" value="{{ old('penanggungjawab', request('penanggungjawab', request('nama'))) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">
                            </div>

                            <!-- Tanggal Daftar -->
                            <div>
                                <label for="tanggal_daftar" class="block text-sm font-medium text-gray-300 mb-2">Tanggal Daftar <span class="text-red-500">*</span></label>
                                <input type="date" name="tanggal_daftar" id="tanggal_daftar" value="{{ old('tanggal_daftar', date('Y-m-d')) }}" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5 [color-scheme:dark]">
                            </div>

                            <!-- Alamat -->
                            <div class="md:col-span-2">
                                <label for="alamat" class="block text-sm font-medium text-gray-300 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                                <textarea name="alamat" id="alamat" rows="3" required
                                    class="w-full bg-dark-4 border border-gray-700 rounded-lg focus:ring-gold focus:border-gold text-white px-4 py-2.5">{{ old('alamat') }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-4 border-t border-gray-700 mt-6">
                            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-gold to-[#C7831A] text-dark font-bold rounded-lg hover:from-yellow-400 hover:to-gold transition-all shadow-[0_0_15px_rgba(245,166,35,0.3)]">
                                Simpan Data Pelanggan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

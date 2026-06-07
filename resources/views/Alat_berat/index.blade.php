<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1z"/></svg>
            {{ __('Data Alat Berat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">DAFTAR ALAT BERAT</h3>
                    <a href="{{ route('Alat_berat.create') }}" class="px-4 py-2 bg-gold text-dark font-bold text-sm rounded-lg hover:bg-yellow-500 transition-colors">
                        + Tambah Alat
                    </a>
                </div>
                
                @if (session('success'))
                    <div class="bg-green-900/30 border border-green-800 text-green-400 px-6 py-4 rounded-lg m-6 mb-0 text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="p-0 overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-300">
                        <thead class="bg-dark-4 text-slate text-xs uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-4">Nama & Kode</th>
                                <th class="px-6 py-4">Tipe Alat</th>
                                <th class="px-6 py-4">Kondisi</th>
                                <th class="px-6 py-4">Harga Sewa / Hari</th>
                                <th class="px-6 py-4">Status Sewa</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($Alat_berat ?? [] as $alat)
                                <tr class="hover:bg-dark-4 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-white">{{ $alat->nama_alat }}</div>
                                        <div class="text-xs text-slate">{{ $alat->kode_unit ?? $alat->kode_alat ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4">{{ $alat->tipe_alat ?? 'Umum' }}</td>
                                    <td class="px-6 py-4">{{ $alat->kondisi }}</td>
                                    <td class="px-6 py-4 font-semibold text-gold">Rp {{ number_format($alat->harga_sewa_per_hari ?? 0, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4">
                                        @if(strtolower($alat->status_sewa) == 'tersedia')
                                            <span class="px-3 py-1 bg-green-900/30 text-green-400 border border-green-800 rounded-full text-xs font-medium">Tersedia</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-900/30 text-red-400 border border-red-800 rounded-full text-xs font-medium">{{ $alat->status_sewa }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('Alat_berat.edit', $alat->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                            <form action="{{ route('Alat_berat.destroy', $alat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus alat berat ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-slate border border-dashed border-gray-700 m-6">
                                        Belum ada data alat berat terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

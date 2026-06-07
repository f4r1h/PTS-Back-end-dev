<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            {{ __('Data Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">DAFTAR PELANGGAN</h3>
                    <a href="{{ route('Pelanggan.create') }}" class="px-4 py-2 bg-gold text-dark font-bold text-sm rounded-lg hover:bg-yellow-500 transition-colors">
                        + Tambah Pelanggan
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
                                <th class="px-6 py-4">Nama Pelanggan / Perusahaan</th>
                                <th class="px-6 py-4">Email & Telepon</th>
                                <th class="px-6 py-4">Jenis</th>
                                <th class="px-6 py-4">Tanggal Daftar</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($Pelanggan ?? [] as $plg)
                                <tr class="hover:bg-dark-4 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-white">{{ $plg->nama ?? $plg->name ?? 'N/A' }}</div>
                                        @if(!empty($plg->nama_perusahaan))
                                            <div class="text-xs text-slate">{{ $plg->nama_perusahaan }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-white">{{ $plg->email }}</div>
                                        <div class="text-xs text-slate">{{ $plg->nomer_telpon }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 bg-gray-800 text-gray-300 border border-gray-700 rounded text-xs">
                                            {{ $plg->jenis ?? 'Individu' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($plg->tanggal_daftar ?? $plg->created_at)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('Pelanggan.edit', $plg->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                            <form action="{{ route('Pelanggan.destroy', $plg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pelanggan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-300">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-8 text-center text-slate border border-dashed border-gray-700 m-6">
                                        Belum ada data pelanggan terdaftar.
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            {{ __('Data Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-white font-condensed tracking-wide">RIWAYAT SELURUH TRANSAKSI</h3>
                    <a href="{{ route('Transaksi.create') }}" class="px-4 py-2 bg-gold text-dark font-bold text-sm rounded-lg hover:bg-yellow-500 transition-colors">
                        + Tambah Transaksi
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
                                <th class="px-6 py-4">ID Transaksi</th>
                                <th class="px-6 py-4">Pelanggan</th>
                                <th class="px-6 py-4">Tanggal Transaksi</th>
                                <th class="px-6 py-4">Metode & Total Bayar</th>
                                <th class="px-6 py-4">Status Pembayaran</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($Transaksi ?? [] as $trx)
                                <tr class="hover:bg-dark-4 transition-colors">
                                    <td class="px-6 py-4 font-medium text-white">#TRX-{{ str_pad($trx->id, 4, '0', STR_PAD_LEFT) }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-white">{{ $trx->pelanggan->nama ?? $trx->pelanggan->name ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($trx->tanggal_transaksi ?? $trx->created_at)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gold">Rp {{ number_format($trx->total_bayar ?? 0, 0, ',', '.') }}</div>
                                        <div class="text-xs text-slate mt-1">Via: {{ $trx->metode_transaksi ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if(strtolower($trx->status_pembayaran) == 'lunas')
                                            <span class="px-3 py-1 bg-green-900/30 text-green-400 border border-green-800 rounded-full text-xs font-medium">Lunas</span>
                                        @else
                                            <span class="px-3 py-1 bg-red-900/30 text-red-400 border border-red-800 rounded-full text-xs font-medium">{{ $trx->status_pembayaran ?? 'Menunggu' }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center gap-3">
                                            <a href="{{ route('Transaksi.edit', $trx->id) }}" class="text-blue-400 hover:text-blue-300">Edit</a>
                                            <form action="{{ route('Transaksi.destroy', $trx->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
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
                                        Belum ada riwayat transaksi.
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

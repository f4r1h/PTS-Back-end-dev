<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            {{ __('Ringkasan Dasbor Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- ADMIN DASHBOARD -->
            
            <!-- Stat Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                <!-- Stat 1: Total Alat -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4">
                    <div class="w-11 h-11 rounded-lg bg-gray-700/50 flex items-center justify-center flex-shrink-0">
                        <svg width="22" height="22" fill="none" stroke="#F5A623" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate text-xs font-medium uppercase tracking-wider truncate">Total Alat</p>
                        <p class="font-condensed text-3xl font-extrabold text-white leading-tight">{{ $stats['total_alat'] ?? 0 }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Unit terdaftar</p>
                    </div>
                </div>

                <!-- Stat 2: Unit Tersedia -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4">
                    <div class="w-11 h-11 rounded-lg bg-green-900/30 flex items-center justify-center flex-shrink-0">
                        <svg width="22" height="22" fill="none" stroke="#66BB6A" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate text-xs font-medium uppercase tracking-wider truncate">Tersedia</p>
                        <p class="font-condensed text-3xl font-extrabold text-green-400 leading-tight">{{ $stats['alat_tersedia'] ?? 0 }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Siap disewakan</p>
                    </div>
                </div>

                <!-- Stat 3: Total Pelanggan -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4">
                    <div class="w-11 h-11 rounded-lg bg-blue-900/30 flex items-center justify-center flex-shrink-0">
                        <svg width="22" height="22" fill="none" stroke="#60A5FA" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate text-xs font-medium uppercase tracking-wider truncate">Pelanggan</p>
                        <p class="font-condensed text-3xl font-extrabold text-blue-400 leading-tight">{{ $stats['total_pelanggan'] ?? 0 }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Klien terdaftar</p>
                    </div>
                </div>

                <!-- Stat 4: Total Transaksi -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4">
                    <div class="w-11 h-11 rounded-lg bg-yellow-900/30 flex items-center justify-center flex-shrink-0">
                        <svg width="22" height="22" fill="none" stroke="#F5A623" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate text-xs font-medium uppercase tracking-wider truncate">Transaksi</p>
                        <p class="font-condensed text-3xl font-extrabold text-gold leading-tight">{{ $stats['total_transaksi'] ?? 0 }}</p>
                        <p class="text-xs text-gray-500 mt-0.5">Riwayat sewa</p>
                    </div>
                </div>

            </div>


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Admin Recent Transactions -->
                <div class="lg:col-span-2 bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                    <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white font-condensed tracking-wide flex items-center gap-2">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            TRANSAKSI TERBARU
                        </h3>
                        <a href="{{ route('admin.penyewaan.index') }}" class="text-xs text-gold hover:text-yellow-400 font-semibold uppercase tracking-wider flex items-center gap-1">
                            Lihat Semua 
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                    <div class="p-0 overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-300">
                            <thead class="bg-dark-4/50 text-slate text-xs uppercase font-semibold tracking-wider">
                                <tr>
                                    <th class="px-6 py-4">ID Transaksi</th>
                                    <th class="px-6 py-4">Pelanggan</th>
                                    <th class="px-6 py-4">Tanggal</th>
                                    <th class="px-6 py-4">Total Bayar</th>
                                    <th class="px-6 py-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                @forelse($recent_transaksi ?? [] as $trx)
                                    <tr class="hover:bg-dark-4 transition-colors">
                                        <td class="px-6 py-4 font-mono text-white text-xs">#TRX-{{ str_pad($trx?->id, 4, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-white">{{ $trx?->pelanggan?->nama ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-slate">{{ \Carbon\Carbon::parse($trx?->tanggal_transaksi)->format('d M Y') }}</td>
                                        <td class="px-6 py-4 font-semibold text-gold">Rp {{ number_format($trx?->total_bayar ?? 0, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $st = strtolower($trx?->status_pembayaran ?? '');
                                                $badge = match(true) {
                                                    str_contains($st, 'lunas')     => 'bg-green-900/30 text-green-400 border-green-800',
                                                    str_contains($st, 'menunggu')  => 'bg-yellow-900/30 text-yellow-400 border-yellow-800',
                                                    str_contains($st, 'dp')        => 'bg-blue-900/30 text-blue-400 border-blue-800',
                                                    default                        => 'bg-gray-800 text-gray-400 border-gray-700',
                                                };
                                            @endphp
                                            <span class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider border {{ $badge }}">{{ $trx?->status_pembayaran ?? 'N/A' }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-12 text-center text-slate">Belum ada data transaksi terbaru.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- New Customer Approvals -->
                <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                    <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white font-condensed tracking-wide flex items-center gap-2">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            PERSETUJUAN PELANGGAN
                        </h3>
                        <span class="text-xs bg-dark-4 text-gray-400 border border-gray-700 px-3 py-1 rounded-full font-semibold">{{ $pending_approvals->count() }} pending</span>
                    </div>
                    <div class="p-0 divide-y divide-gray-800 max-h-[400px] overflow-y-auto">
                        @forelse($pending_approvals as $pending)
                            <div class="p-5 hover:bg-dark-4 transition-colors flex flex-col justify-between gap-3">
                                <div>
                                    <div class="font-bold text-white text-sm">{{ $pending->name }}</div>
                                    <div class="text-xs text-gray-400 mt-1 font-mono">{{ $pending->email }}</div>
                                </div>
                                <a href="{{ route('Pelanggan.create') }}?nama={{ urlencode($pending->name) }}&email={{ urlencode($pending->email) }}" class="btn-action-approve">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Setujui & Jadikan Pelanggan
                                </a>
                            </div>
                        @empty
                            <div class="p-8 text-center text-gray-500 text-sm">
                                <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="mx-auto mb-3 opacity-20"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Tidak ada pendaftar baru yang menunggu persetujuan.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

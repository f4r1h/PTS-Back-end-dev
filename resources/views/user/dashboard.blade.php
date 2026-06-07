<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
            {{ __('Dasbor Pengguna') }}
        </h2>
    </x-slot>

    @php
        $totalTransaksi = isset($myApplications) ? $myApplications->count() : 0;
        $sewaAktif = isset($myApplications) ? $myApplications->flatMap->jadwal_alat->whereIn('status_jadwal', ['dijadwalkan', 'sedang berjalan'])->count() : 0;
        $totalBiaya = isset($myApplications) ? $myApplications->sum('total_bayar') : 0;
    @endphp

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-dark-3 via-[#1E222E] to-dark-2 border border-dark shadow-sm sm:rounded-xl overflow-hidden relative group hover:shadow-[0_4px_25px_rgba(245,166,35,0.08)] transition-all duration-500">
                <div class="absolute -right-10 -top-10 w-64 h-64 bg-gold/5 rounded-full blur-3xl group-hover:bg-gold/10 transition-colors duration-700 pointer-events-none"></div>
                <div class="p-8 relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="space-y-2">
                        <p class="text-gold text-xs uppercase font-semibold tracking-widest">DASHBOARD UTAMA</p>
                        <h3 class="text-3xl font-condensed font-bold text-white leading-tight">
                            Selamat Datang, <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold to-yellow-400">{{ Auth::user()->name }}</span>!
                        </h3>
                        <p class="text-gray-400 text-sm max-w-2xl">
                            Kelola penyewaan alat berat Anda dengan mudah melalui dasbor ini. Anda dapat melihat unit yang tersedia, memantau status penyewaan aktif, dan mengelola profil Anda.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('user.penyewaan.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-gold to-[#C7831A] hover:from-yellow-400 hover:to-gold text-[#0D0F14] font-extrabold text-sm rounded-xl transition-all shadow-[0_4px_15px_rgba(245,166,35,0.2)] hover:shadow-[0_4px_25px_rgba(245,166,35,0.4)] hover:-translate-y-0.5">
                            Sewa Alat Berat Baru
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Stats Summary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Stat 1: Total Pengajuan -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4 hover:border-gray-800 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-yellow-500/10 flex items-center justify-center flex-shrink-0 border border-yellow-500/20">
                        <svg width="22" height="22" fill="none" stroke="#F5A623" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Total Pengajuan</p>
                        <p class="font-condensed text-3xl font-extrabold text-white mt-0.5 leading-tight">{{ $totalTransaksi }}</p>
                        <p class="text-[11px] text-gray-500 mt-0.5">Transaksi diajukan</p>
                    </div>
                </div>

                <!-- Stat 2: Sewa Aktif -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4 hover:border-gray-800 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-green-500/10 flex items-center justify-center flex-shrink-0 border border-green-500/20">
                        <svg width="22" height="22" fill="none" stroke="#10B981" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0zm-2-4h2a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 8V9m-8 6h8M2 10V7a2 2 0 012-2h6M14 9h6m-3-4v4"/></svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Unit Sedang Disewa</p>
                        <p class="font-condensed text-3xl font-extrabold text-green-400 mt-0.5 leading-tight">{{ $sewaAktif }}</p>
                        <p class="text-[11px] text-gray-500 mt-0.5">Unit dalam penjadwalan / berjalan</p>
                    </div>
                </div>

                <!-- Stat 3: Total Pengeluaran -->
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex items-center gap-4 hover:border-gray-800 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center flex-shrink-0 border border-blue-500/20">
                        <svg width="22" height="22" fill="none" stroke="#3B82F6" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider">Total Biaya Sewa</p>
                        <p class="font-condensed text-2xl font-extrabold text-gold mt-1 leading-tight">Rp {{ number_format($totalBiaya, 0, ',', '.') }}</p>
                        <p class="text-[11px] text-gray-500 mt-0.5">Nilai seluruh transaksi sewa</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Col: Available Units -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden">
                        <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-white font-condensed tracking-wide flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-green-400 inline-block animate-pulse"></span>
                                ALAT BERAT TERSEDIA
                            </h3>
                            <a href="{{ route('user.penyewaan') }}" class="text-xs text-gold hover:text-yellow-400 font-bold uppercase tracking-wider flex items-center gap-1 transition-colors">
                                Lihat Katalog
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                @forelse(collect($availableProperties)->take(4) as $alat)
                                    <div class="bg-dark-4 border border-gray-700/60 rounded-xl p-5 flex flex-col justify-between hover:-translate-y-1 hover:border-gold hover:shadow-[0_4px_20px_rgba(245,166,35,0.06)] transition-all duration-300 group">
                                        <div>
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="font-bold text-white font-condensed text-xl group-hover:text-gold transition-colors">{{ $alat->nama_alat }}</h4>
                                                <span class="px-2 py-0.5 bg-green-950/40 text-green-400 border border-green-800/60 rounded text-[9px] font-bold uppercase tracking-wider">Tersedia</span>
                                            </div>
                                            <div class="space-y-1 mb-4">
                                                <p class="text-xs text-gray-400 flex items-center gap-1.5">
                                                    <span class="text-gray-500">Tipe:</span> {{ $alat->tipe_alat ?? 'N/A' }}
                                                </p>
                                                <p class="text-xs text-gray-400 flex items-center gap-1.5">
                                                    <span class="text-gray-500">Kode:</span> {{ $alat->kode_unit ?? 'N/A' }}
                                                </p>
                                            </div>
                                            <div class="text-lg font-bold text-gold mb-5">
                                                Rp {{ number_format($alat->harga_sewa_per_hari ?? 0, 0, ',', '.') }} 
                                                <span class="text-gray-500 text-xs font-normal">/ hari</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('user.penyewaan.create') }}?alat_id={{ $alat->id }}" class="block w-full text-center bg-dark-2 hover:bg-gold hover:text-dark border border-gray-600 hover:border-gold text-white text-sm py-2.5 rounded-lg transition-all font-bold tracking-wide">
                                            Sewa Sekarang
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-span-full py-12 text-center text-gray-500 border border-dashed border-gray-700 rounded-xl">
                                        <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="mx-auto mb-3 opacity-30"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1z"/></svg>
                                        Saat ini belum ada unit alat berat yang tersedia.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Col: My Transactions -->
                <div class="space-y-6">
                    <div class="bg-dark-3 border border-dark shadow-sm sm:rounded-xl overflow-hidden flex flex-col h-full">
                        <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-white font-condensed tracking-wide flex items-center gap-2">
                                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="text-gold"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                RIWAYAT TERBARU
                            </h3>
                            <a href="{{ route('user.penyewaan') }}" class="text-xs text-gray-400 hover:text-white font-bold transition-colors">LIHAT SEMUA</a>
                        </div>
                        <div class="p-0 flex-1 flex flex-col">
                            <ul class="divide-y divide-gray-800 flex-1">
                                @forelse(collect($myApplications)->take(5) as $app)
                                    <li class="p-5 hover:bg-dark-4 transition-colors">
                                        <div class="flex justify-between items-center mb-1">
                                            <span class="font-mono font-bold text-white text-sm">#TRX-{{ str_pad($app->id, 4, '0', STR_PAD_LEFT) }}</span>
                                            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($app->tanggal_transaksi)->format('d M Y') }}</span>
                                        </div>
                                        <div class="text-xs text-gray-400 mb-3 flex justify-between items-center">
                                            <span>Metode: <strong class="text-gray-300">{{ $app->metode_transaksi }}</strong></span>
                                            <span>Total: <strong class="text-gold">Rp {{ number_format($app->total_bayar, 0, ',', '.') }}</strong></span>
                                        </div>
                                        <div>
                                            @php
                                                $st = strtolower($app->status_pembayaran ?? '');
                                                $badge = match(true) {
                                                    str_contains($st,'lunas')    => 'bg-green-950/40 text-green-400 border-green-800/60',
                                                    str_contains($st,'menunggu') => 'bg-yellow-950/40 text-yellow-400 border-yellow-800/60',
                                                    str_contains($st,'dp')       => 'bg-blue-950/40 text-blue-400 border-blue-800/60',
                                                    default                      => 'bg-gray-800 text-gray-400 border-gray-700',
                                                };
                                            @endphp
                                            <span class="px-2.5 py-0.5 border {{ $badge }} rounded text-[9px] font-extrabold uppercase tracking-wider">{{ $app->status_pembayaran }}</span>
                                        </div>
                                    </li>
                                @empty
                                    <li class="p-10 text-center text-gray-500 flex flex-col items-center justify-center h-full">
                                        <svg width="32" height="32" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="opacity-20 mb-3"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/></svg>
                                        <span class="text-sm">Belum ada riwayat transaksi.</span>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

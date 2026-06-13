<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Penyewaan Saya
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if(session('success'))
                <div class="bg-green-900/30 border border-green-700 text-green-400 px-5 py-3 rounded-lg text-sm flex items-center gap-2">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-900/30 border border-red-700 text-red-400 px-5 py-3 rounded-lg text-sm">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-dark-3 via-dark-3 to-dark-2 border border-dark rounded-xl p-7 relative overflow-hidden group hover:shadow-[0_4px_25px_rgba(245,166,35,0.06)] transition-all duration-500">
                <div class="absolute -right-6 -top-6 w-40 h-40 bg-gold/5 rounded-full blur-2xl group-hover:bg-gold/10 transition-all"></div>
                <div class="absolute -right-2 bottom-0 w-24 h-24 bg-gold/5 rounded-full blur-xl group-hover:bg-gold/10 transition-all"></div>
                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div>
                        <p class="text-gold text-xs uppercase font-semibold tracking-widest mb-1">Dashboard Penyewaan</p>
                        <h3 class="font-condensed text-3xl font-bold text-white mb-2">
                            Halo, <span class="text-gold">{{ Auth::user()->name }}</span>!
                        </h3>
                        @if(!$pelanggan)
                            <div class="bg-red-950/40 border border-red-800/60 text-red-400 px-4 py-3 rounded-lg text-sm mt-3 inline-flex items-center gap-2">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                <span>Data pelanggan Anda belum terdaftar. Hubungi admin untuk mendaftarkan data Anda sebelum bisa melakukan penyewaan.</span>
                            </div>
                        @else
                            <p class="text-gray-400 text-sm">Kelola penyewaan alat berat Anda dengan mudah dan pantau jadwal operasionalnya.</p>
                        @endif
                    </div>
                    @if($pelanggan)
                        <div class="flex-shrink-0">
                            <a href="{{ route('user.penyewaan.create') }}" class="btn-primary inline-flex items-center gap-2 px-5 py-2.5 text-sm rounded-lg transition-all">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Ajukan Penyewaan Baru
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Jadwal & Unit Aktif --}}
            @if($jadwalAktif && $jadwalAktif->count() > 0)
                <div class="bg-dark-3 border border-dark rounded-xl overflow-hidden p-6 space-y-4">
                    <h3 class="font-condensed text-lg font-bold text-white tracking-wide flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-green-400 inline-block animate-pulse"></span>
                        UNIT & JADWAL AKTIF
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @foreach($jadwalAktif as $jadwal)
                            @php
                                $now = \Carbon\Carbon::now()->startOfDay();
                                $end = \Carbon\Carbon::parse($jadwal->tanggal_selesai)->startOfDay();
                                $start = \Carbon\Carbon::parse($jadwal->tanggal_mulai)->startOfDay();
                                
                                if ($now->lt($start)) {
                                    $daysText = "Mulai dalam " . $now->diffInDays($start) . " hari";
                                    $progressPct = 0;
                                    $progressBarColor = 'bg-yellow-500';
                                } elseif ($now->gt($end)) {
                                    $daysText = "Selesai";
                                    $progressPct = 100;
                                    $progressBarColor = 'bg-gray-500';
                                } else {
                                    $totalDays = $start->diffInDays($end) ?: 1;
                                    $elapsedDays = $start->diffInDays($now);
                                    $progressPct = min(100, round(($elapsedDays / $totalDays) * 100));
                                    $remaining = $now->diffInDays($end);
                                    $daysText = $remaining == 0 ? "Hari ini terakhir" : "Sisa " . $remaining . " hari";
                                    $progressBarColor = 'bg-green-500';
                                }
                                
                                $js = strtolower($jadwal->status_jadwal ?? '');
                                $statusLabel = match($js) {
                                    'dijadwalkan' => 'Dijadwalkan',
                                    'sedang berjalan' => 'Sedang Berjalan',
                                    'selesai' => 'Selesai',
                                    default => ucfirst($jadwal->status_jadwal),
                                };
                                $statusBadge = match($js) {
                                    'dijadwalkan' => 'bg-yellow-950/40 text-yellow-400 border-yellow-800/60',
                                    'sedang berjalan' => 'bg-green-950/40 text-green-400 border-green-800/60',
                                    'selesai' => 'bg-gray-800 text-gray-400 border-gray-700',
                                    default => 'bg-gray-800 text-gray-400 border-gray-700',
                                };
                            @endphp
                            <div class="bg-dark-4 border border-gray-700/60 rounded-xl p-5 space-y-4 hover:border-gold/30 transition-all">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-bold text-white text-lg font-condensed tracking-wide">{{ $jadwal->alat_berat->nama_alat ?? 'Alat Berat' }}</h4>
                                        <p class="text-xs text-gray-500 font-mono mt-0.5">TRX #TRX-{{ str_pad($jadwal->transaksi_id, 4, '0', STR_PAD_LEFT) }}</p>
                                    </div>
                                    <span class="px-2.5 py-0.5 border {{ $statusBadge }} rounded text-[9px] font-extrabold uppercase tracking-wider">{{ $statusLabel }}</span>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-xs">
                                        <span class="text-gray-400 font-medium">Periode Sewa</span>
                                        <span class="text-white font-semibold">{{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') }} - {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d M Y') }}</span>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="w-full bg-dark-2 rounded-full h-2 overflow-hidden border border-dark">
                                        <div class="{{ $progressBarColor }} h-full transition-all duration-500" style="width: {{ $progressPct }}%"></div>
                                    </div>
                                    <div class="flex justify-between items-center text-[11px] text-gray-400">
                                        <span>Progres: {{ $progressPct }}%</span>
                                        <span class="font-bold text-gold">{{ $daysText }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Riwayat Transaksi --}}
                <div class="lg:col-span-2">
                    <div class="bg-dark-3 border border-dark rounded-xl overflow-hidden">
                        <div class="px-6 py-5 border-b border-dark bg-dark-2 flex justify-between items-center">
                            <h3 class="font-condensed text-lg font-bold text-white tracking-wide">RIWAYAT PENYEWAAN</h3>
                            <span class="text-xs bg-dark-4 text-gray-400 border border-gray-700 px-3 py-1 rounded-full font-semibold">{{ $myRentals->count() }} transaksi</span>
                        </div>
                        <div class="divide-y divide-gray-800">
                            @forelse($myRentals as $trx)
                            <div class="p-6 hover:bg-dark-4/40 transition-colors space-y-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono font-bold text-white text-sm">#TRX-{{ str_pad($trx->id,4,'0',STR_PAD_LEFT) }}</span>
                                            <span class="text-gray-600 text-xs">·</span>
                                            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($trx->tanggal_transaksi)->format('d M Y') }}</span>
                                        </div>
                                        <div class="font-bold text-white text-base mt-1">{{ $trx->jenis_transaksi ?? 'Penyewaan' }}</div>
                                    </div>
                                    @php
                                        $st = strtolower($trx->status_pembayaran ?? '');
                                        $badge = match(true) {
                                            str_contains($st,'lunas')    => 'bg-green-950/40 text-green-400 border-green-800/60',
                                            str_contains($st,'menunggu') => 'bg-yellow-950/40 text-yellow-400 border-yellow-800/60',
                                            str_contains($st,'dp')       => 'bg-blue-950/40 text-blue-400 border-blue-800/60',
                                            default                      => 'bg-gray-800 text-gray-400 border-gray-700',
                                        };
                                    @endphp
                                    <span class="px-2.5 py-1 rounded border {{ $badge }} text-[10px] font-extrabold uppercase tracking-wider">{{ $trx->status_pembayaran }}</span>
                                </div>

                                {{-- Jadwal Alat --}}
                                @if($trx->jadwal_alat && $trx->jadwal_alat->count())
                                    <div class="space-y-2.5">
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Unit Alat & Jadwal</p>
                                        @foreach($trx->jadwal_alat as $jadwal)
                                        <div class="bg-dark-4 border border-gray-800 rounded-xl px-4 py-3 flex justify-between items-center">
                                            <div>
                                                <div class="text-white text-sm font-bold">{{ $jadwal->alat_berat->nama_alat ?? 'Alat Berat' }}</div>
                                                <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-gray-500"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                    {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d M Y') }}
                                                    <span class="text-gray-600">→</span> 
                                                    {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->format('d M Y') }}
                                                </div>
                                            </div>
                                            @php
                                                $js = strtolower($jadwal->status_jadwal ?? '');
                                                $jbadge = match(true) {
                                                    str_contains($js,'selesai')    => 'bg-gray-800 text-gray-400 border-gray-700',
                                                    str_contains($js,'berjalan') || str_contains($js,'aktif') => 'bg-green-950/40 text-green-400 border-green-800/60',
                                                    str_contains($js,'dijadwalkan') || str_contains($js,'konfirmasi') => 'bg-yellow-950/40 text-yellow-400 border-yellow-800/60',
                                                    default                        => 'bg-gray-800 text-gray-400 border-gray-700',
                                                };
                                                $jlabel = match(true) {
                                                    str_contains($js,'selesai') => 'Selesai',
                                                    str_contains($js,'berjalan') || str_contains($js,'aktif') => 'Aktif',
                                                    str_contains($js,'dijadwalkan') => 'Dijadwalkan',
                                                    default => ucfirst($jadwal->status_jadwal),
                                                };
                                            @endphp
                                            <span class="px-2 py-0.5 border {{ $jbadge }} rounded text-[9px] font-extrabold uppercase tracking-wider">{{ $jlabel }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex justify-between items-center pt-2 border-t border-gray-800/60">
                                    <span class="text-xs text-gray-400">Pembayaran via <strong class="text-gray-300">{{ $trx->metode_transaksi }}</strong></span>
                                    <div class="text-right">
                                        <span class="text-[10px] text-gray-500 block">Total Pembayaran</span>
                                        <span class="font-bold text-gold text-base">Rp {{ number_format($trx->total_bayar,0,',','.') }}</span>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="px-6 py-16 text-center text-gray-500">
                                <svg width="40" height="40" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="mx-auto mb-3 opacity-30"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/></svg>
                                <p class="text-sm">Belum ada riwayat penyewaan.</p>
                                @if($pelanggan)
                                    <a href="{{ route('user.penyewaan.create') }}" class="mt-3 inline-block text-gold hover:text-yellow-400 text-sm font-semibold hover:underline">Ajukan penyewaan pertama Anda →</a>
                                @endif
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Sidebar: Alat Tersedia --}}
                <div class="space-y-6">
                    <div class="bg-dark-3 border border-dark rounded-xl overflow-hidden">
                        <div class="px-6 py-4 border-b border-dark bg-dark-2">
                            <h3 class="font-condensed text-lg font-bold text-white tracking-wide flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-green-400 inline-block animate-pulse"></span>
                                ALAT TERSEDIA
                            </h3>
                        </div>
                        <div class="divide-y divide-gray-800 max-h-[500px] overflow-y-auto">
                            @forelse($availableAlat as $alat)
                            <div class="p-5 hover:bg-dark-4/40 transition-colors flex flex-col justify-between gap-3">
                                <div>
                                    <div class="font-bold text-white text-sm hover:text-gold transition-colors">{{ $alat->nama_alat }}</div>
                                    <div class="text-xs text-gray-400 mt-1">{{ $alat->tipe_alat ?? 'N/A' }} · {{ $alat->kode_unit ?? '' }}</div>
                                    <div class="text-gold text-xs font-bold mt-2">Rp {{ number_format($alat->harga_sewa_per_hari??0,0,',','.') }} <span class="text-gray-500 font-normal">/ hari</span></div>
                                </div>
                                @if($pelanggan)
                                    <a href="{{ route('user.penyewaan.create') }}?alat_id={{ $alat->id }}" class="text-xs text-center border border-gray-700 hover:border-gold hover:text-dark hover:bg-gold text-white font-bold py-2 rounded-lg transition-all">
                                        Sewa Alat Ini →
                                    </a>
                                @endif
                            </div>
                            @empty
                            <div class="px-5 py-8 text-center text-gray-500 text-sm">Tidak ada alat tersedia saat ini.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

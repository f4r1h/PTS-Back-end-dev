<x-app-layout>
    <x-slot name="header">
        <h2 class="font-condensed font-bold text-2xl text-white leading-tight flex items-center gap-2">
            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="text-gold">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
            Manajemen Penyewaan
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

            {{-- Stat Cards --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                @php
                    $cards = [
                        ['label'=>'Total Transaksi',   'value'=>$stats['total'],   'color'=>'text-white',       'icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2'],
                        ['label'=>'Belum Lunas',       'value'=>$stats['aktif'],   'color'=>'text-yellow-400',  'icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['label'=>'Lunas',             'value'=>$stats['lunas'],   'color'=>'text-green-400',   'icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                        ['label'=>'Menunggu Konfirmasi','value'=>$stats['pending'],'color'=>'text-red-400',     'icon'=>'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z'],
                    ];
                @endphp
                @foreach($cards as $c)
                <div class="bg-dark-3 border border-dark rounded-xl p-5 flex flex-col gap-2">
                    <div class="flex justify-between items-start">
                        <span class="text-slate text-xs font-semibold uppercase tracking-wider">{{ $c['label'] }}</span>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="{{ $c['color'] }} opacity-60">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $c['icon'] }}"/>
                        </svg>
                    </div>
                    <div class="font-condensed text-4xl font-extrabold {{ $c['color'] }}">{{ $c['value'] }}</div>
                </div>
                @endforeach
            </div>

            {{-- Table --}}
            <div class="bg-dark-3 border border-dark rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-dark bg-dark-2 flex justify-between items-center">
                    <h3 class="font-condensed text-lg font-bold text-white tracking-wide">SEMUA PENYEWAAN</h3>
                    <a href="{{ route('Transaksi.create') }}" class="px-4 py-2 bg-gold text-[#0D0F14] text-sm font-bold rounded-lg hover:bg-yellow-400 transition-colors">+ Buat Transaksi</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-gray-300 text-left">
                        <thead class="text-xs uppercase font-semibold text-slate bg-dark-2">
                            <tr>
                                <th class="px-5 py-4">ID</th>
                                <th class="px-5 py-4">Pelanggan</th>
                                <th class="px-5 py-4">Tanggal</th>
                                <th class="px-5 py-4">Jenis & Metode</th>
                                <th class="px-5 py-4">Total Bayar</th>
                                <th class="px-5 py-4">Status</th>
                                <th class="px-5 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @forelse($transaksi as $trx)
                            <tr class="hover:bg-dark-4 transition-colors">
                                <td class="px-5 py-4 font-mono text-white text-xs">#{{ str_pad($trx->id,4,'0',STR_PAD_LEFT) }}</td>
                                <td class="px-5 py-4">
                                    <div class="font-medium text-white">{{ $trx->pelanggan->nama ?? 'N/A' }}</div>
                                    <div class="text-xs text-slate">{{ $trx->pelanggan->nama_perusahaan ?? '' }}</div>
                                </td>
                                <td class="px-5 py-4 text-slate">{{ \Carbon\Carbon::parse($trx->tanggal_transaksi)->format('d M Y') }}</td>
                                <td class="px-5 py-4">
                                    <div class="text-white">{{ $trx->jenis_transaksi ?? '-' }}</div>
                                    <div class="text-xs text-slate">{{ $trx->metode_transaksi ?? '-' }}</div>
                                </td>
                                <td class="px-5 py-4 font-semibold text-gold">Rp {{ number_format($trx->total_bayar,0,',','.') }}</td>
                                <td class="px-5 py-4">
                                    @php
                                        $st = strtolower($trx->status_pembayaran ?? '');
                                        $badge = match(true) {
                                            str_contains($st, 'lunas')     => ['bg-green-900/30 text-green-400 border-green-800', 'Lunas'],
                                            str_contains($st, 'menunggu')  => ['bg-yellow-900/30 text-yellow-400 border-yellow-800', 'Menunggu'],
                                            str_contains($st, 'dp')        => ['bg-blue-900/30 text-blue-400 border-blue-800', 'DP'],
                                            default                        => ['bg-gray-800 text-gray-400 border-gray-700', $trx->status_pembayaran],
                                        };
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-medium border {{ $badge[0] }}">{{ $badge[1] }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-center items-center gap-3">
                                        {{-- Quick status update form --}}
                                        <form action="{{ route('admin.penyewaan.status', $trx->id) }}" method="POST" class="flex items-center gap-2">
                                            @csrf @method('PATCH')
                                            <select name="status_pembayaran" onchange="this.form.submit()"
                                                class="bg-dark-4 border border-gray-700 text-gray-300 text-xs rounded px-2 py-1 focus:ring-gold focus:border-gold outline-none cursor-pointer">
                                                <option value="Menunggu Pembayaran" {{ $trx->status_pembayaran=='Menunggu Pembayaran'?'selected':'' }}>Menunggu</option>
                                                <option value="DP Dibayar"          {{ $trx->status_pembayaran=='DP Dibayar'?'selected':'' }}>DP</option>
                                                <option value="Lunas"               {{ $trx->status_pembayaran=='Lunas'?'selected':'' }}>Lunas</option>
                                            </select>
                                        </form>
                                        <a href="{{ route('Transaksi.edit', $trx->id) }}" class="text-blue-400 hover:text-blue-300 text-xs">Edit</a>
                                        <form action="{{ route('Transaksi.destroy', $trx->id) }}" method="POST" onsubmit="return confirm('Hapus transaksi ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-300 text-xs">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-5 py-12 text-center text-slate">Belum ada data penyewaan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

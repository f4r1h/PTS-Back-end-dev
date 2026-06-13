<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Alat_berat;
use App\Models\Jadwal_alat;

class TransaksiController extends Controller
{
    // ===================== ADMIN METHODS =====================

    public function index()
    {
        $Transaksi = Transaksi::with(['pelanggan'])->orderBy('created_at', 'desc')->get();
        return view('Transaksi.index', compact('Transaksi'));
    }

    public function create()
    {
        return view('Transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id'      => 'required',
            'properti_id'       => 'required',
            'tanggal_transaksi' => 'required|date',
            'jenis_transaksi'   => 'required|string',
            'metode_transaksi'  => 'required|string',
            'status_pembayaran' => 'required|string',
            'total_bayar'       => 'required|numeric|min:0',
        ]);

        Transaksi::create($request->all());

        return redirect()->route('Transaksi.index')
            ->with('success', 'Transaksi berhasil dibuat.');
    }

    public function edit(string $id)
    {
        $Transaksi = Transaksi::findOrFail($id);
        return view('Transaksi.edit', compact('Transaksi'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id'      => 'required',
            'properti_id'       => 'required',
            'tanggal_transaksi' => 'required|date',
            'jenis_transaksi'   => 'required|string',
            'metode_transaksi'  => 'required|string',
            'status_pembayaran' => 'required|string',
            'total_bayar'       => 'required|numeric|min:0',
        ]);

        $Transaksi = Transaksi::findOrFail($id);
        $Transaksi->update($request->all());

        return redirect()->route('Transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $Transaksi = Transaksi::findOrFail($id);
        $Transaksi->delete();

        return redirect()->route('Transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }

    // ===================== ADMIN PENYEWAAN METHODS =====================

    public function adminIndex()
    {
        $transaksi = Transaksi::with(['pelanggan', 'jadwal_alat.alat_berat'])
            ->orderBy('created_at', 'desc')
            ->get();

        $stats = [
            'total'    => $transaksi->count(),
            'aktif'    => $transaksi->where('status_pembayaran', '!=', 'Lunas')->count(),
            'lunas'    => $transaksi->where('status_pembayaran', 'Lunas')->count(),
            'pending'  => $transaksi->where('status_pembayaran', 'Menunggu Pembayaran')->count(),
        ];

        return view('penyewaan.admin', compact('transaksi', 'stats'));
    }

    public function adminShow(string $id)
    {
        $transaksi = Transaksi::with(['pelanggan', 'jadwal_alat.alat_berat'])->findOrFail($id);
        return view('penyewaan.admin_show', compact('transaksi'));
    }

    public function adminUpdateStatus(Request $request, string $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|string',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update(['status_pembayaran' => $request->status_pembayaran]);

        return redirect()->route('admin.penyewaan.index')
            ->with('success', 'Status penyewaan berhasil diperbarui.');
    }

    public function adminUpdate(Request $request, string $id)
    {
        $request->validate([
            'status_pembayaran' => 'required',
        ]);

        $Transaksi = Transaksi::findOrFail($id);
        $Transaksi->update($request->all());

        return redirect()->route('admin.applications.index')
            ->with('success', 'Transaksi updated successfully');
    }

    // ===================== USER PENYEWAAN METHODS =====================

    public function userIndex()
    {
        $user      = auth()->user();
        $pelanggan = Pelanggan::where('email', $user->email)->first();

        $myRentals    = collect();
        $jadwalAktif  = collect();

        if ($pelanggan) {
            $myRentals = Transaksi::with(['jadwal_alat.alat_berat'])
                ->where('pelanggan_id', $pelanggan->id)
                ->orderBy('created_at', 'desc')
                ->get();

            $jadwalAktif = Jadwal_alat::with(['alat_berat', 'transaksi'])
                ->whereHas('transaksi', fn($q) => $q->where('pelanggan_id', $pelanggan->id))
                ->where('status_jadwal', '!=', 'Selesai')
                ->get();
        }

        $availableAlat = Alat_berat::whereIn('status_sewa', ['Tersedia', 'tersedia'])->get();

        return view('penyewaan.user', compact('myRentals', 'jadwalAktif', 'availableAlat', 'pelanggan'));
    }

    public function userCreate()
    {
        $user      = auth()->user();
        $pelanggan = Pelanggan::where('email', $user->email)->first();
        if (!$pelanggan) {
            return redirect()->route('dashboard')->with('error', 'Akun Anda belum disetujui sebagai pelanggan oleh Admin.');
        }
        $availableAlat = Alat_berat::whereIn('status_sewa', ['Tersedia', 'tersedia'])->get();
        return view('penyewaan.user_create', compact('availableAlat'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'properti_id'       => 'required|exists:alat_berat,id',
            'tanggal_mulai'     => 'required|date|after_or_equal:today',
            'tanggal_selesai'   => 'required|date|after:tanggal_mulai',
            'jenis_transaksi'   => 'required|string',
            'metode_transaksi'  => 'required|string',
        ]);

        $user      = auth()->user();
        $pelanggan = Pelanggan::where('email', $user->email)->first();

        if (!$pelanggan) {
            return back()->withErrors(['error' => 'Data pelanggan Anda belum terdaftar. Hubungi admin.']);
        }

        $alat = Alat_berat::findOrFail($request->properti_id);
        $mulai    = \Carbon\Carbon::parse($request->tanggal_mulai);
        $selesai  = \Carbon\Carbon::parse($request->tanggal_selesai);
        $durasi   = $mulai->diffInDays($selesai);
        $total    = $durasi * ($alat->harga_sewa_per_hari ?? 0);

        // Buat Transaksi
        $transaksi = Transaksi::create([
            'pelanggan_id'      => $pelanggan->id,
            'properti_id'       => $request->properti_id,
            'tanggal_transaksi' => now()->toDateString(),
            'jenis_transaksi'   => $request->jenis_transaksi,
            'metode_transaksi'  => $request->metode_transaksi,
            'status_pembayaran' => 'Menunggu Pembayaran',
            'total_bayar'       => $total,
        ]);

        // Buat Jadwal Alat
        Jadwal_alat::create([
            'alat_berat_id'  => $request->properti_id,
            'transaksi_id'   => $transaksi->id,
            'tanggal_mulai'  => $request->tanggal_mulai,
            'tanggal_selesai'=> $request->tanggal_selesai,
            'status_jadwal'  => 'dijadwalkan',
        ]);

        return redirect()->route('user.penyewaan')
            ->with('success', 'Pengajuan sewa berhasil dikirim! Menunggu konfirmasi admin.');
    }
}

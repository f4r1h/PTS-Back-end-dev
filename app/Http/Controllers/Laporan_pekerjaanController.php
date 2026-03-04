<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Laporan_pekerjaanController extends Controller
{
    public function index()
    {
        $Laporan_pekerjaan = \App\Models\Laporan_pekerjaan::all();
        return view('Laporan_pekerjaan.index', compact('Laporan_pekerjaan'));
    }

    public function create()
    {
        return view('Laporan_pekerjaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_laporan' => 'required',
            'catatan_kondisi' => 'required',
            'foto_laporan' => 'required',
        ]);

        \App\Models\Laporan_pekerjaan::create($request->all());

        return redirect()->route('Laporan_pekerjaan.index')
            ->with('success', 'Laporan_pekerjaan created successfully.');
    }

    public function edit(string $id)
    {
        $Laporan_pekerjaan = \App\Models\Laporan_pekerjaan::findOrFail($id);
        return view('Laporan_pekerjaan.edit', compact('Laporan_pekerjaan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_laporan' => 'required',
            'catatan_kondisi' => 'required',
            'foto_laporan' => 'required',
        ]);

        $Laporan_pekerjaan = \App\Models\Laporan_pekerjaan::findOrFail($id);
        $Laporan_pekerjaan->update($request->all());

        return redirect()->route('Laporan_pekerjaan.index')
            ->with('success', 'Laporan_pekerjaan updated successfully');
    }

    public function destroy(string $id)
    {
        $Laporan_pekerjaan = \App\Models\Laporan_pekerjaan::findOrFail($id);
        $Laporan_pekerjaan->delete();

        return redirect()->route('Laporan_pekerjaan.index')
            ->with('success', 'Laporan_pekerjaan deleted successfully');
    }
}

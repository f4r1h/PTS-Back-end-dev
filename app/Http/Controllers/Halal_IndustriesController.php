<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Halal_IndustriesController extends Controller
{
    public function index()
    {
        $Halal_Industries = \App\Models\Halal_Industries::all();
        return view('Halal_Industries.index', compact('Halal_Industries'));
    }

    public function create()
    {
        return view('Halal_Industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'admin' => 'required',
            'alat_berat' => 'required',
            'jadwal_alat' => 'required',
            'transaksi' => 'required',
            'properti' => 'required',
            'pelanggan' => 'required',
            'laporan_pekerjaan' => 'required',
            'operator' => 'required',
        ]);

        \App\Models\Halal_Industries::create($request->all());

        return redirect()->route('Halal_Industries.index')
            ->with('success', 'Halal_Industries created successfully.');
    }

    public function edit(string $id)
    {
        $Halal_Industries = \App\Models\Halal_Industries::findOrFail($id);
        return view('Halal_Industries.edit', compact('Halal_Industries'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'admin' => 'required',
            'alat_berat' => 'required',
            'jadwal_alat' => 'required',
            'transaksi' => 'required',
            'properti' => 'required',
            'pelanggan' => 'required',
            'laporan_pekerjaan' => 'required',
            'operator' => 'required',
        ]);

        $Halal_Industries = \App\Models\Halal_Industries::findOrFail($id);
        $Halal_Industries->update($request->all());

        return redirect()->route('Halal_Industries.index')
            ->with('success', 'Halal_Industries updated successfully');
    }

    public function destroy(string $id)
    {
        $Halal_Industries = \App\Models\Halal_Industries::findOrFail($id);
        $Halal_Industries->delete();

        return redirect()->route('Halal_Industries')
            ->with('success', 'Halal_Industries deleted successfully');
    }
}

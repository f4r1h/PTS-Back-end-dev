<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Alat_beratController extends Controller
{
    public function index()
    {
        $Alat_berat = \App\Models\Alat_berat::all();
        return view('Alat_berat.index', compact('Alat_berat'));
    }

    public function create()
    {
        return view('Alat_berat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'kode_alat' => 'required|unique:alat_berat',
            'kondisi' => 'required',
            'status_sewa' => 'required',
            'foto_alat' => 'required',
        ]);

        \App\Models\Alat_berat::create($request->all());

        return redirect()->route('Alat_berat.index')
            ->with('success', 'Alat_berat created successfully.');
    }

    public function edit(string $id)
    {
        $Alat_berat = \App\Models\Alat_berat::findOrFail($id);
        return view('Alat_berat.edit', compact('Alat_berat'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_alat' => 'required',
            'kode_alat' => 'required|unique:alat_berat',
            'kondisi' => 'required',
            'status_sewa' => 'required',
            'foto_alat' => 'required',
        ]);

        $Alat_berat = \App\Models\Alat_berat::findOrFail($id);
        $Alat_berat->update($request->all());

        return redirect()->route('Alat_berat.index')
            ->with('success', 'Alat_berat updated successfully');
    }

    public function destroy(string $id)
    {
        $Alat_berat = \App\Models\Alat_berat::findOrFail($id);
        $Alat_berat->delete();

        return redirect()->route('Alat_berat.index')
            ->with('success', 'Alat_berat deleted successfully');
    }
}

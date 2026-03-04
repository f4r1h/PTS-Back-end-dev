<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $Pelanggan = \App\Models\Pelanggan::all();
        return view('Pelanggan.index', compact('Pelanggan'));
    }

    public function create()
    {
        return view('Pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jenis' => 'required',
            'email' => 'required|email|unique:Pelanggan,email',
            'nomer_telpon' => 'required|unique:Pelanggan',
            'nomer_identitas' => 'required|unique:pelanggan',
            'nama_perusahaan' => 'required',
            'penanggungjawab' => 'required',
            'alamat' => 'required',
            'tanggal_daftar' => 'required', 
        ]);

        \App\Models\Pelanggan::create($request->all());

        return redirect()->route('Pelanggan.index')
            ->with('success', 'Pelanggan created successfully.');
    }

    public function edit(string $id)
    {
        $Pelanggan = \App\Models\Pelanggan::findOrFail($id);
        return view('Pelanggan.edit', compact('Pelanggan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'jenis' => 'required',
            'email' => 'required|email|unique:Pelanggan,email',
            'nomer_telpon' => 'required|unique:Pelanggan',
            'nomer_identitas' => 'required|unique:pelanggan',
            'nama_perusahaan' => 'required',
            'penanggungjawab' => 'required',
            'alamat' => 'required',
            'tanggal_daftar' => 'required',
        ]);

        $Pelanggan = \App\Models\Pelanggan::findOrFail($id);
        $Pelanggan->update($request->all());

        return redirect()->route('Pelanggan.index')
            ->with('success', 'Pelanggan updated successfully');
    }

    public function destroy(string $id)
    {
        $Pelanggan = \App\Models\Pelanggan::findOrFail($id);
        $Pelanggan->delete();

        return redirect()->route('Pelanggan.index')
            ->with('success', 'Pelanggan deleted successfully');
    }
}

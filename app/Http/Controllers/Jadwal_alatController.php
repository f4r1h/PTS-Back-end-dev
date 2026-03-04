<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Jadwal_alatController extends Controller
{
    public function index()
    {
        $Jadwal_alat = \App\Models\Jadwal_alat::all();
        return view('Jadwal_alat.index', compact('Jadwal_alat'));
    }

    public function create()
    {
        return view('Jadwal_alat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        \App\Models\Jadwal_alat::create($request->all());

        return redirect()->route('Jadwal_alat.index')
            ->with('success', 'Jadwal_alat created successfully.');
    }

    public function edit(string $id)
    {
        $Jadwal_alat = \App\Models\Jadwal_alat::findOrFail($id);
        return view('Jadwal_alat.edit', compact('Jadwal_alat'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $Jadwal_alat = \App\Models\Jadwal_alat::findOrFail($id);
        $Jadwal_alat->update($request->all());

        return redirect()->route('Jadwal_alat.index')
            ->with('success', 'Jadwal_alat updated successfully');
    }

    public function destroy(string $id)
    {
        $Jadwal_alat = \App\Models\Jadwal_alat::findOrFail($id);
        $Jadwal_alat->delete();

        return redirect()->route('Jadwal_alat.index')
            ->with('success', 'Jadwal_alat deleted successfully');
    }
}

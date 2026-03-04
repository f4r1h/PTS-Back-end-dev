<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $Transaksi = \App\Models\Transaksi::all();
        return view('Transaksi.index', compact('Transaksi'));
    }

    public function create()
    {
        return view('Transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'metode_transaksi' => 'required',
        ]);

        \App\Models\Transaksi::create($request->all());

        return redirect()->route('Transaksi.index')
            ->with('success', 'Transaksi created successfully.');
    }

    public function edit(string $id)
    {
        $Transaksi = \App\Models\Transaksi::findOrFail($id);
        return view('Transaksi.edit', compact('Transaksi'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'metode_transaksi' => 'required',
        ]);

        $Transaksi = \App\Models\Transaksi::findOrFail($id);
        $Transaksi->update($request->all());

        return redirect()->route('Transaksi.index')
            ->with('success', 'Transaksi updated successfully');
    }

    public function destroy(string $id)
    {
        $Transaksi = \App\Models\Transaksi::findOrFail($id);
        $Transaksi->delete();

        return redirect()->route('Transaksi.index')
            ->with('success', 'Transaksi deleted successfully');
    }
}

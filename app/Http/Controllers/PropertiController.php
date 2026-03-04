<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiController extends Controller
{
    public function index()
    {
        $Properti = \App\Models\Properti::all();
        return view('Properti.index', compact('Properti'));
    }

    public function create()
    {
        return view('Properti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_properti' => 'required',
            'tipe_properti' => 'required',
            'kondisi' => 'required',
        ]);

        \App\Models\Properti::create($request->all());

        return redirect()->route('Properti.index')
            ->with('success', 'Properti created successfully.');
    }

    public function edit(string $id)
    {
        $Properti = \App\Models\Properti::findOrFail($id);
        return view('Properti.edit', compact('Properti'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_properti' => 'required',
            'tipe_properti' => 'required',
            'kondisi' => 'required',
        ]);

        $Properti = \App\Models\Properti::findOrFail($id);
        $Properti->update($request->all());

        return redirect()->route('Properti.index')
            ->with('success', 'Properti updated successfully');
    }

    public function destroy(string $id)
    {
        $Properti = \App\Models\Properti::findOrFail($id);
        $Properti->delete();

        return redirect()->route('Properti.index')
            ->with('success', 'Properti deleted successfully');
    }
}

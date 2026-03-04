<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $Operator = \App\Models\Operator::all();
        return view('Operator.index', compact('Operator'));
    }

    public function create()
    {
        return view('Operator.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_operator' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        \App\Models\Operator::create($request->all());

        return redirect()->route('Operator.index')
            ->with('success', 'Operator created successfully.');
    }

    public function edit(string $id)
    {
        $Operator = \App\Models\Operator::findOrFail($id);
        return view('Operator.edit', compact('Operator'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_operator' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $Operator = \App\Models\Operator::findOrFail($id);
        $Operator->update($request->all());

        return redirect()->route('Operator.index')
            ->with('success', 'Operator updated successfully');
    }

    public function destroy(string $id)
    {
        $Operator = \App\Models\Operator::findOrFail($id);
        $Operator->delete();

        return redirect()->route('Operator.index')
            ->with('success', 'Operator deleted successfully');
    }
}

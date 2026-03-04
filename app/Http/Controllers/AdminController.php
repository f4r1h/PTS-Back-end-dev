<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = \App\Models\admin::all();
        return view('admin.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:admin,email',
            'nomer_telpon' => 'required',
        ]);

        \App\Models\admin::create($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'admin created successfully.');
    }

    public function edit(string $id)
    {
        $admin = \App\Models\admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:admin,email,' . $id,
            'nomer_telpon' => 'required',
        ]);

        $admin = \App\Models\admin::findOrFail($id);
        $admin->update($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'admin updated successfully');
    }

    public function destroy(string $id)
    {
        $admin = \App\Models\admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')
            ->with('success', 'admin deleted successfully');
    }
}

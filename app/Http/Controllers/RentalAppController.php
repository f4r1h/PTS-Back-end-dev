<?php

namespace App\Http\Controllers;

use App\Models\RentalApplication;
use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'alat_berat_id' => 'required|exists:alat_berat,id',
            'duration_months' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        RentalApplication::create([
            'user_id' => Auth::id(),
            'alat_berat_id' => $request->alat_berat_id,
            'duration_months' => $request->duration_months,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Pengajuan sewa berhasil dikirim. Menunggu persetujuan admin.');
    }

    public function adminIndex()
    {
        $applications = RentalApplication::with(['user', 'alat_berat'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.applications.index', compact('applications'));
    }

    public function adminUpdate(Request $request, RentalApplication $application)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $application->update(['status' => $request->status]);

        if ($request->status === 'approved') {
            $property = $application->property;
            $property->update(['status' => 'rented']);

            // Create Tenant record
            Tenant::create([
                'name' => $application->user->name,
                'email' => $application->user->email,
                'type' => 'personal', // default
                'phone' => 'Belum diisi', // Need manual update later
                'identity_number' => 'Belum diisi', // Need manual update later
            ]);
        }

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}

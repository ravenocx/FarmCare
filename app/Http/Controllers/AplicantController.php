<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;

class AplicantController extends Controller
{
    public function index()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'admin.home'],
            ['label' => 'Consultation', 'url' => 'admin.consultation'],
        ];

        // Ambil data dokter hewan yang is_accepted nya false
        $veterinariansByAccepted = Veterinarian::get();

        return view('pages.admin.vete-management.applicant', compact('breadcrumbs', 'veterinariansByAccepted'));
    }

    public function updateStatus(Request $request, $id)
    {
        $veterinarian = Veterinarian::find($id);
        if (!$veterinarian) {
            return redirect()->route('admin.management.applicant')->with('error', 'Veterinarian not found.');
        }
    
        $status = $request->input('status');
        if ($status === 'accept') {
            $veterinarian->update(['is_accepted' => true]);
            $message = 'Veterinarian has been accepted.';
        } elseif ($status === 'reject') {
            $veterinarian->update(['is_accepted' => false]);
            $message = 'Veterinarian has been rejected.';
        } else {
            return redirect()->route('admin.management.applicant')->with('error', 'Invalid status provided.');
        }
    
        return redirect()->route('admin.management.applicant')->with('success', $message);
    }
    

}

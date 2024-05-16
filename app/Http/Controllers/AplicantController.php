<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;

class AplicantController extends Controller
{

    public function store(Request $request) {
      // Validasi input
      dd($request);
      $request->validate([
          'name' => 'required|string|max:255',
          'specialist' => 'required|string|max:255',
          'university' => 'required|string|max:255',
          'graduate_year' => 'required|integer',
          'email' => 'required|email|max:255',
          'certification' => 'nullable|string|max:255',
          'consultation_price' => 'required|numeric',
          'reservation_price' => 'required|numeric',
          'photo'         => 'nullable|file|mimes:jpeg,png,jpg,webp'
      ]);
       // Array untuk menyimpan data yang akan diperbarui
  $dataToUpdate = $request->except(['photo']);

  // Mengunggah gambar jika ada
  if ($request->hasFile('photo')) {
      $image = $request->file('photo');
      $fileName = $request->name . '-' . $request->specialist . '-' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
      $destination = 'storage/photo/veterinarian';
      $image->move($destination, $fileName);
      $dataToUpdate['photo'] = $fileName;
  }
  dd($dataToUpdate);
      // Temukan dokter hewan berdasarkan ID
      $veterinarian = Veterinarian::findOrFail($id);

      // Update data dokter hewan
      $veterinarian->update($dataToUpdate);

      // Redirect dengan pesan sukses
      return redirect()->route('admin.management.veterinarian')->with('success', 'Veterinarian profile updated successfully.');
    }
    public function updateVeterinarian(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'specialist' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'graduate_year' => 'required|integer',
            'email' => 'required|email|max:255',
            'certification' => 'nullable|string|max:255',
            'consultation_price' => 'required|numeric',
            'reservation_price' => 'required|numeric',
        ]);

        // Temukan dokter hewan berdasarkan ID
        $veterinarian = Veterinarian::findOrFail($id);

        // Update data dokter hewan
        $veterinarian->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('admin.management.veterinarian')->with('success', 'Veterinarian profile updated successfully.');
    }

       
    public function veterinarianDetail($id)
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'admin.home'],
            ['label' => 'Veterinarian', 'url' => 'admin.aplicant'],
            ['label' => 'Detail', 'url' => 'admin.veterinarian.detail'],
        ];
        $veterinarian = Veterinarian::findOrFail($id);

        return view('pages.admin.vete-management.vete-detail', compact('breadcrumbs', 'veterinarian'));
    }

    public function editVeterinarianForm($id)
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'admin.home'],
            ['label' => 'Consultation', 'url' => 'admin.aplicant'],
            ['label' => 'Edit', 'url' => 'admin.veterinarian.edit.form'],
        ];
        $veterinarian = Veterinarian::findOrFail($id);

        return view('pages.admin.vete-management.vete-edit', compact('breadcrumbs', 'veterinarian'));
    }
    public function veterinarian()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'admin.home'],
            ['label' => 'Consultation', 'url' => 'admin.aplicant'],
        ];

        // Ambil data dokter hewan yang is_accepted nya false
        $veterinariansByAccepted = Veterinarian::where('is_accepted', 1)->get();

        return view('pages.admin.vete-management.veterinarian', compact('breadcrumbs', 'veterinariansByAccepted'));
    }
    public function aplicant()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'admin.home'],
            ['label' => 'Consultation', 'url' => 'admin.aplicant'],
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

    public function index()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'admin.home'],
            ['label' => 'Consultation', 'url' => 'admin.veterinarian'],
        ];

        // Ambil data dokter hewan yang is_accepted nya false
        $veterinarians = Veterinarian::where('is_accepted', 1)->get();
        

        return view('pages.admin.vete-management.index', compact('breadcrumbs', 'veterinarians'));
    }

    

}
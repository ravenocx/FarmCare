<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VeterProfileController extends Controller
{
    public function showProfile()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Profile', 'url' => 'user.profile'],
        ];

        $veterinarian = Auth::guard('veterinarian')->user();
        return view('pages.veterinarian.profile.index', compact('breadcrumbs','veterinarian'));
    }

    public function editProfileForm()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Profile', 'url' => 'user.profile'],
            ['label' => 'Edit', 'url' => 'user.profile.edit.form'],
        ];
        $veterinarian = Auth::guard('veterinarian')->user();
        return view('pages.veterinarian.profile.edit', compact('breadcrumbs','veterinarian'));
    }

    public function submitProfileForm(Request $request)
    {
        $veterinarian = Auth::guard('veterinarian')->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'specialist' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'graduate_year' => 'required|integer',
            'email' => 'required|email|max:255',
            'certification' => 'nullable|mimes:pdf|max:2048',
            'consultation_price' => 'required|numeric',
            'reservation_price' => 'required|numeric'
          ]);
          // Array untuk menyimpan data yang akan diperbarui
         
          $dataToUpdate = $request->except(['certification']);
          // Mengunggah gambar jika ada
          if ($request->hasFile('certification')) {
              $certification = $request->file('certification');
              $fileName = $request->name . '-' . $request->specialist . '-' . date('YmdHis') . '.' . $certification->getClientOriginalExtension();
              $destination = 'storage/certifications';
              $certification->move($destination, $fileName);
              $dataToUpdate['certification'] = $fileName;
            }
            // Ambil data pengguna yang sedang login
           
        $veterinarian->update($dataToUpdate); // Update data profil dengan data yang dikirimkan dari form

        return redirect()->route('veterinarian.profile')->with('success', 'Profile updated successfully.');
    }

    public function updatePhoto(Request $request, $id)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $veterinarian = Veterinarian::findOrFail($id);

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($veterinarian->photo && Storage::exists('public/photo/veterinarian/' . $veterinarian->photo)) {
                Storage::delete('public/photo/veterinarian/' . $veterinarian->photo);
            }

            // Store the new photo
            $image = $request->file('photo');
      $fileName = $request->name . '-' . $request->specialist . '-' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
      $destination = 'storage/photo/veterinarian';
      $image->move($destination, $fileName);
      $dataToUpdate['photo'] = $fileName;

            // Update the veterinarian's photo
            
            $veterinarian->update($dataToUpdate);
        }

        return redirect()->back()->with('success', 'Photo updated successfully.');
    }

 
}
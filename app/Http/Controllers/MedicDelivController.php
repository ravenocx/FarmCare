<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;
use App\Models\Veterinarian;

class MedicDelivController extends Controller
{
    private $breadcrumbs;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Consultation', 'url' => 'user.consultation'],
            ['label' => 'Buy Medicine', 'url' => 'user.medicdeliv'],
        ];
    }
    public function index()
    {
        $medication = Medication::first();
        $breadcrumbs = $this->breadcrumbs;

        if ($medication) {
            $totalPrice = $medication->price * $medication->quantity;
        } else {
            $totalPrice = 0; // Atau nilai default yang sesuai
        }

        return view('pages.user.medicdeliv.index', compact('medication', 'breadcrumbs', 'totalPrice'));
    }
    public function create()
    {
        return view('pages.user.medicdeliv.create')->with('breadcrumbs', $this->breadcrumbs);
    }

    // public function edit($medication_id)
    // {
    //     $medication = Medication::find($medication_id);
    //     $breadcrumbs = array_merge($this->breadcrumbs, [
    //         ['label' => 'Update Order', 'url' => 'user.medicdeliv.edit'],
    //     ]);
    //     return view('pages.user.medicdeliv.edit', compact('medication', 'breadcrumbs'));
    // }

    public function edit($medication_id, Request $request)
{
    // Mendapatkan data medication berdasarkan ID
    $medication = Medication::find($medication_id);

    // Pastikan medication ditemukan
    if (!$medication) {
        return redirect()->back()->withErrors(['error' => 'Medication not found']);
    }

    // Mengecek apakah request berisi data address yang baru
    if ($request->has('address')) {
        // Mengupdate field address saja
        $medication->address = $request->input('address');

        // Menyimpan perubahan
        $medication->save();

        // Menyusun breadcrumbs
        $breadcrumbs = array_merge($this->breadcrumbs, [
            ['label' => 'Update Order', 'url' => route('user.medicdeliv.edit', ['id' => $medication_id])],
        ]);

        // Mengembalikan view dengan data medication yang sudah diperbarui
        return view('pages.user.medicdeliv.edit', compact('medication', 'breadcrumbs'))
               ->with('success', 'Address updated successfully');
    }

    // Jika tidak ada address dalam request, kembalikan view dengan data medication tanpa perubahan
    $breadcrumbs = array_merge($this->breadcrumbs, [
        ['label' => 'Update Order', 'url' => route('user.medicdeliv.edit', ['id' => $medication_id])],
    ]);

    return view('pages.user.medicdeliv.edit', compact('medication', 'breadcrumbs'));
}


    public function upload()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, [
            ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
        ]);
        return view('pages.user.medicdeliv.upload', compact('breadcrumbs'));
    }

    public function success()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, [
            ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
            ['label' => 'Payment Success', 'url' => 'user.medicdeliv.success'],
        ]);
        return view('pages.user.medicdeliv.success', compact('breadcrumbs'));
    }

    public function status()
    {
        $breadcrumbs = array_merge($this->breadcrumbs, [
            ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
            ['label' => 'Payment Success', 'url' => 'user.medicdeliv.success'],
            ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
        ]);
        return view('pages.user.medicdeliv.status', compact('breadcrumbs'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;

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
        $medication = Medication::findOrFail(30);
        $breadcrumbs = $this->breadcrumbs;

        if ($medication) {
            $totalPrice = $medication->price * $medication->quantity;
        } else {
            $totalPrice = 0;
        }

        return view('pages.user.medicdeliv.index', compact('medication', 'breadcrumbs', 'totalPrice'));
    }

    public function edit($medication_id, Request $request)
    {
        $medication = Medication::find($medication_id);
        if ($medication) {
            $totalPrice = $medication->price * $medication->quantity;
        } else {
            $totalPrice = 0;
        }

        $successMessage = null;
        $errorMessage = null;

        if ($request->isMethod('post') && $request->has('newAddress')) {
            $newAddress = $request->input('newAddress');

            if ($medication) {
                $medication->address = $newAddress;
                $medication->save();
                $successMessage = 'Address updated successfully';
            } else {
                $errorMessage = 'Medication not found';
            }
        }

        $breadcrumbs = $this->breadcrumbs;

        return view('pages.user.medicdeliv.edit', compact('medication', 'breadcrumbs', 'totalPrice', 'successMessage', 'errorMessage'));
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
        $medications = Medication::findOrFail(30);

        $breadcrumbs = array_merge($this->breadcrumbs, [
            ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
            ['label' => 'Payment Success', 'url' => 'user.medicdeliv.success'],
            ['label' => 'Upload Payment', 'url' => 'user.medicdeliv.upload'],
        ]);
        return view('pages.user.medicdeliv.status', compact('medications', 'breadcrumbs'));
    }
}
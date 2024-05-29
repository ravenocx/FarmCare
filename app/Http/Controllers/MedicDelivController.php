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
        $medication = Medication::first(); // Mengambil data pertama dari model Medication
        $breadcrumbs = $this->breadcrumbs; // Asumsikan ini sudah diatur dengan benar

        return view('pages.user.medicdeliv.index', compact('medication', 'breadcrumbs'));
    }
    public function create()
    {
        return view('pages.user.medicdeliv.create')->with('breadcrumbs', $this->breadcrumbs);
    }

    public function edit($medication_id)
    {
        $medication = Medication::find($medication_id);
        $breadcrumbs = array_merge($this->breadcrumbs, [
            ['label' => 'Update Order', 'url' => 'user.medicdeliv.edit'],
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

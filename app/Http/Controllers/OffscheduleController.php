<?php

namespace App\Http\Controllers;

use App\Models\Offschedule;
use App\Models\Veterinarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class OffscheduleController extends Controller
{
    public function index()
    {
        $offschedules = Offschedule::all();
        return view('pages.veterinarian.offlinereservation.index', compact('offschedules'));
    }

    public function create()
    {
        $veterinarians = Veterinarian::all();
        return view('pages.veterinarian.offlinereservation.offschedule.create', compact('veterinarians'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'session' => 'required|in:07:00-11:00,13:00-17:00'
        ]);
        $veterinarian = Auth::guard('veterinarian')->user();

        // Cek apakah veterinarian ditemukan
        if (!$veterinarian) {
            return redirect()->back()->withErrors('No authenticated veterinarian found.');
        }

        // Menyimpan data Offschedule dengan nilai yang diambil dari objek Veterinarian
        Offschedule::create([
             
            'veterinarian_id' => $veterinarian->id,
            'specialist' => $veterinarian->specialist,
            'reservation_price' => $veterinarian->reservation_price,
            'date' => $data['date'],
            'session' => $data['session']

        ]);
        return redirect()->route('offschedule.index')->with('success', 'Jadwal berhasil disimpan.');

        
    }

    public function edit(Offschedule $offschedules)
    {
        $veterinarians = Veterinarian::all();
        $offschedules = Offschedule::all();
        return view('pages.veterinarian.offlinereservation.offschedule.edit', compact('offschedules', 'veterinarians'));
    }

    public function update(Request $request, Offschedule $offschedules)
    {
        $data = $request->validate([
            'veterinarian_id' => 'required|exists:veterinarians,id',
            'date' => 'required|date',
            'session' => 'required|in:07:00-11:00,13:00-17:00',
            'price_id' => 'required|exists:prices,id',
            'status' => 'required|in:available,scheduled,complete',
        ]);
        $offschedules->update($data);
        return redirect()->route('offschedules.index');
    }

    public function destroy(Offchedule $offschedules)
    {
        $offschedules->delete();
        return redirect()->route('schedules.index');
    }
}
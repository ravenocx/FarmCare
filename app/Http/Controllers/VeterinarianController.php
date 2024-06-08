<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class VeterinarianController extends Controller
{
    public function show_dashboard() {
        return view('pages.veterinarian.dashboard.index', [
            'total_penjualan' => Order::sum('price'),
            'total_pasien' => Order::count(),
            'total_appoinment' => Order::where('order_status', '!=', 'complete')->count()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Veterinarian;
use Auth;
use Illuminate\Http\Requests;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)->get();
        $totalPatients = $orders->count();
        $offlineReservations = $orders->where('service_category', 'reservation')->count();
        $onlineConsultations = $orders->where('service_category', 'consultation')->count();
        $ongoingAppointments = $orders->where('order_status', 'On going')->count();

        // dd($orders);
        return view('pages.veterinarian.orderhistory.index', compact('orders', 'totalPatients', 'offlineReservations', 'onlineConsultations', 'ongoingAppointments'));
    }


    public function detailOrder($order_id)
    {
        $order = Order::find($order_id);
        if (!$order) {
            abort(404, 'Order not found');
        }

        return view('pages.veterinarian.orderhistory.detail', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrder_HistoryRequest $request, Order_History $order_History)
    {
        //
    }
}

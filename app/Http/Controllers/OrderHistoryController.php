<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Veterinarian;
use Illuminate\Http\Requests;

class OrderHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.veterinarian.orderhistory.index');
    }

    public function detailOrder()
    {
        return view('pages.veterinarian.orderhistory.detail');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order_History $order_History) : view
    {
        return view('orderhistories.detail', [
            'order_history' => $order_History
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order_History $order_History)
    {
        return view('orderhistories.detail', [
            'order_history' => $order_History
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrder_HistoryRequest $request, Order_History $order_History)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order_History $order_History)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Order;


class OfflineConsultationController extends Controller
{
    public function index()
    {
        $onGoingOrders = Order::where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->where('order_status', 'On going')
        ->orderBy('order_date', 'asc')
        ->get();

        $latestOrders = Order::where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->whereNotIn('order_status', ['On going'])
        ->where('service_category', 'reservation') // Misalkan ini adalah kategori layanan yang benar
        ->orderBy('order_date', 'desc')
        ->limit(3) // Ambil hanya 3 pesanan terbaru
        ->get();


        $service_schedule = ServiceSchedule::where('service_category', 'reservation')->orderBy('schedule_start', 'asc')->get();

        $orders = Order::orderBy('order_date')->get();
        return view('pages.veterinarian.offlinereservation.index', [
            'services' => $service_schedule,
            'orders' => $orders,
            'onGoingOrders' => $onGoingOrders,
            'latestOrders' => $latestOrders,
        ]);
    }

    public function show_create_form()
    {
        return view('pages.veterinarian.offlinereservation.create');
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'schedule_start' => [
                    'required',
                    'date',
                    'before:schedule_end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'schedule_end' => 'required|date|after:schedule_start',
            ];

            $validatedData = $request->validate($rules);

            $service = new ServiceSchedule;

            $service->schedule_start = $request['schedule_start'];
            $service->schedule_end = $request['schedule_end'];
            $service->service_category = 'reservation';
            $service->is_reserved = 0;
            $service->veterinarian_id = Auth::guard('veterinarian')->id();
            $service->save();
            session()->flash('success', 'Successfully add new offline consultation schedule');
            return redirect(url('veterinarian/offline-reservation'));
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        try {
            $service_schedule = ServiceSchedule::find($request->id);
            return view('pages.veterinarian.offlinereservation.edit', [
                'service' => $service_schedule
            ]);
        } catch (\Throwable $th) {
            return back();
        }
    }

    public function update(Request $request)
    {
        try {
            $service_schedule = ServiceSchedule::find($request->id);
            $service_schedule->schedule_start = $request->schedule_start;
            $service_schedule->schedule_end = $request->schedule_end;
            $service_schedule->update();


            
            session()->flash('success', 'Successfully edit offline consultation schedule');
            return redirect(url('veterinarian/offline-reservation'));
        } catch (\Throwable $e) {
            session()->flash('error', 'An error occurred during editing the schedule :  ' . $e->getMessage());
            return back();
        }
    }

    public function destroy_schedule(Request $request)
    {

        try {
            $service_schedule = ServiceSchedule::findOrFail($request->id);
            $service_schedule->delete();
            session()->flash('success', 'Successfully cancel offline consultation schedule');
            return back();
        } catch (\Throwable $e) {
            session()->flash('error', 'An error occurred during deleting the schedule :  ' . $e->getMessage());
            return back();
        }
    }

    public function update_offline_reservation(Request $request)
    {
        try {
            $orders = Order::find($request->id);
            $orders->order_status = $request->order_status;
            $orders->update();
            if ($request->order_status === 'Complete') {
                // Hapus pesanan dari "On Going Offline Reservation"
                
            }
    
            session()->flash('success', 'Successfully update status order');
            return redirect(url('veterinarian/offline-reservation'));
        } catch (\Throwable $e) {
            session()->flash('error', 'An error occurred during editing the schedule :  ' . $e->getMessage());
            return back();
        }
    }

    public function detail_order(Request $request)
    {
        $order = Order::find($request->id);
        return view('pages.veterinarian.offlinereservation.detail-order', [
            'order' => $order
        ]);
        
    }
    
}

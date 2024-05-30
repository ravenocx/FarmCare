<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VeterConsultationController extends Controller
{

    private $currentDateTime;
    public function __construct()
    {
        $this->currentDateTime = Carbon::now();
    }
    public function index(){
        $serviceSchedules = ServiceSchedule::select('*')
        ->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->orderByRaw("
            CASE
                WHEN '$this->currentDateTime' BETWEEN schedule_start AND schedule_end THEN 1
                WHEN schedule_start > '$this->currentDateTime' THEN 2
                ELSE 3
            END
        ")
        ->orderBy('schedule_start', 'asc')
        ->limit(3)
        ->get();

        $onGoingOrders = Order::where('veterinarian_id' , Auth::guard('veterinarian')->user()->id)
        ->where('order_status', 'On going')
        ->orderBy('order_date', 'asc')
        ->get();

        $latestOrders = Order::where('veterinarian_id' , Auth::guard('veterinarian')->user()->id)
        ->where('order_status', '!=', 'On going')
        ->where('service_category' , 'consultation')
        ->orderBy('order_date', 'desc')
        ->limit(3)
        ->get();

        return view('pages.veterinarian.consultation.index', compact('serviceSchedules', 'onGoingOrders', 'latestOrders'));
    }

    public function showAllConsultationSchedules(){
        $serviceSchedules = ServiceSchedule::select('*')
        ->where('veterinarian_id', Auth::guard('veterinarian')->user()->id)
        ->orderByRaw("
            CASE
                WHEN '$this->currentDateTime' BETWEEN schedule_start AND schedule_end THEN 1
                WHEN schedule_start > '$this->currentDateTime' THEN 2
                ELSE 3
            END
        ")
        ->orderBy('schedule_start', 'asc')
        ->paginate(15);

        return view('pages.veterinarian.consultation.schedule.index', compact('serviceSchedules'));
    }

    public function createSchedule(){
        return view('pages.veterinarian.consultation.schedule.create');
    }

    public function createScheduleSubmit(Request $request){
        try{
            $this->validate($request, [
                'datetime-start' => [
                    'required',
                    'date',
                    'before:datetime-end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'datetime-end' => 'required|date|after:datetime-start',
            ]);
    
            $data= $request->all();
            
            ServiceSchedule::create([
                'veterinarian_id'=> Auth::guard('veterinarian')->user()->id,
                'schedule_start'=> $data['datetime-start'],
                'schedule_end'=> $data['datetime-end'],
                'service_category' => 'consultation',
            ]);
            Session::flash('success','Successfully add new online consultation schedule');
            return redirect()->back();
        }catch(\Exception $e){
            Session::flash('error','An error occurred :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editServiceSchedule($id){
        try{
            $serviceSchedule = ServiceSchedule::findOrFail($id);
            return view('pages.veterinarian.consultation.schedule.edit', compact('serviceSchedule'));
        }catch (ModelNotFoundException $e) {
            abort(404);
        }
    }

    public function editServiceScheduleSubmit(Request $request, $id){
        try{
            $this->validate($request, [
                'datetime-start' => [
                    'required',
                    'date',
                    'before:datetime-end',
                    function ($attribute, $value, $fail) {
                        if (Carbon::parse($value)->isBefore(Carbon::now())) {
                            $fail('The ' . $attribute . ' must be a date and time after the current time.');
                        }
                    },
                ],
                'datetime-end' => 'required|date|after:datetime-start',
            ]);

            $serviceSchedule = ServiceSchedule::findOrFail($id);
            $data= $request->all();

            $serviceSchedule->update([
                'schedule_start' => $data['datetime-start'],
                'schedule_end' => $data['datetime-end']
            ]);
            Session::flash('success','Successfully edit online consultation schedule');
            return redirect()->back();
        }catch (\Exception $e) {
            Session::flash('error','An error occurred during editing the schedule :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function deleteServiceSchedule($id){
        try {
            $serviceSchedule = ServiceSchedule::findOrFail($id);
            
            $serviceSchedule -> delete();
            Session::flash('success','Successfully cancel online consultation schedule');
            return redirect()->back();
        }catch (\Exception $e) {
            Session::flash('error','An error occurred during deleting the schedule :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function editConsultationStatus(Request $request, $id) {
        try {
            // dd($request['status']);
            $this->validate($request, [
                'status'=>'string|required|in:On going,Complete,Cancel'
            ]);

            $consultationOrder = Order::findOrFail($id);
            $data= $request->all();

            $consultationOrder->update([
                'order_status' => $data['status']
            ]);

            Session::flash('success','Successfully edit online consultation status');
            return redirect()->back();
        }catch (\Exception $e) {
            Session::flash('error','An error occurred during editing the status :  ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function getConsultationOrderDetails($id){
        try {
            $order = Order::with('user')->findOrFail($id);
            return view('pages.veterinarian.consultation.order.detail',compact('order'));
        }catch (ModelNotFoundException $e) {
            abort(404);
        }
    }
}

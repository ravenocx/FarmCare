<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use Auth;
use Carbon\Carbon;

class VeterConsultationController extends Controller
{

    public function index(){
        $currentDateTime = Carbon::now();
        $serviceSchedules = ServiceSchedule::where('schedule_end', '>' , $currentDateTime)
        ->orderBy('schedule_start', 'ASC')
        ->limit(3)
        ->get();

        return view('pages.veterinarian.consultation.index', compact('serviceSchedules'));
    }

    public function createSchedule(){
        return view('pages.veterinarian.consultation.schedule.create');
    }

    public function createScheduleSubmit(Request $request){
        $this->validate($request,[
            'datetime-start'=>'required|date|before:datetime-end',
            'datetime-end'=> 'required|date|after:datetime-start',
        ]);

        $data= $request->all();
        
        
        $result = ServiceSchedule::create([
            'veterinarian_id'=> Auth::guard('veterinarian')->user()->id,
            'schedule_start'=> $data['datetime-start'],
            'schedule_end'=> $data['datetime-end'],
            'service_category' => 'consultation',
        ]);

        if($result){
            request()->session()->flash('success','Successfully registered');
            return redirect()->back();
        }else{
            request()->session()->flash('error','Please try again!');
            return redirect()->back();
        }
    }
}

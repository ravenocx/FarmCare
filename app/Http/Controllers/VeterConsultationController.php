<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use Auth;
use Carbon\Carbon;

class VeterConsultationController extends Controller
{

    private $currentDateTime;
    public function __construct()
    {
        $this->currentDateTime = Carbon::now();
    }
    public function index(){
        $serviceSchedules = ServiceSchedule::where('schedule_end', '>=' , $this->currentDateTime)
        ->where('schedule_start', '<=', $this->currentDateTime)
        ->orderBy('schedule_start', 'ASC')
        ->limit(3)
        ->get();

        return view('pages.veterinarian.consultation.index', compact('serviceSchedules'));
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
            request()->session()->flash('success','Successfully add new online consultation schedule');
            return redirect()->back();
        }catch(\Exception $e){
            request()->session()->flash('error','An error occurred :  ' . $e->getMessage());
            return redirect()->back();
        }
        
    }
}

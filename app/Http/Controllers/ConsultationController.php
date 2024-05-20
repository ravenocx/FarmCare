<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;
use Carbon\Carbon;


class ConsultationController extends Controller
{
    private $breadcrumbs;
    private $currentDateTime;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'Consultation', 'url' => route('user.consultation')],
        ];
        $this->currentDateTime = Carbon::now();
    }
    public function index()
    {
        $now = $this->currentDateTime;
        
        $veterinariansRecommendation = Veterinarian::select('veterinarians.*')
        ->selectRaw('COUNT(service_schedules.id) as service_schedules_count')
        ->leftJoin('service_schedules', function ($join) use ($now) {
            $join->on('veterinarians.id', '=', 'service_schedules.veterinarian_id')
                ->where('service_schedules.is_reserved', false)
                ->where('service_schedules.schedule_start', '<=', $now)
                ->where('service_schedules.schedule_end', '>=', $now);
        })
        ->groupBy('veterinarians.id')
        ->orderBy('service_schedules_count', 'desc')
        ->with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->orderBy('veterinarians.id', 'desc') // Order by veterinarian id descending
        ->limit(2) // Limit the result to 2 veterinarians
        ->get();
        
        $veterinariansBySpecialist = Veterinarian::select('veterinarians.*')
        ->selectRaw('COUNT(service_schedules.id) as service_schedules_count')
        ->leftJoin('service_schedules', function ($join) use ($now) {
            $join->on('veterinarians.id', '=', 'service_schedules.veterinarian_id')
                ->where('service_schedules.is_reserved', false)
                ->where('service_schedules.schedule_start', '<=', $now)
                ->where('service_schedules.schedule_end', '>=', $now);
        })
        ->groupBy('veterinarians.id')
        ->orderBy('veterinarians.specialist')
        ->orderBy('service_schedules_count', 'desc') 
        ->with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->get()
        ->groupBy('specialist')
        ->map(function ($group) {
            return $group->take(3); // Limit to 3 veterinarians per specialist
        });


        return view('pages.user.consultation.index', compact('veterinariansRecommendation', 'veterinariansBySpecialist'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function getDoctorBySpecialist($specialist)
    {
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => $specialist, 'url' => route('user.consultation.specialist' , ['specialist' => $specialist])]));

        $now = $this->currentDateTime;

        $veterinarians = Veterinarian::select('veterinarians.*')
        ->selectRaw('COUNT(service_schedules.id) as service_schedules_count')
        ->leftJoin('service_schedules', function ($join) use ($now) {
            $join->on('veterinarians.id', '=', 'service_schedules.veterinarian_id')
                ->where('service_schedules.is_reserved', false)
                ->where('service_schedules.schedule_start', '<=', $now)
                ->where('service_schedules.schedule_end', '>=', $now);
        })
        ->where('veterinarians.specialist', $specialist)
        ->groupBy('veterinarians.id')
        ->orderBy('service_schedules_count', 'desc') 
        ->with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])
        ->paginate(15);

        return view('pages.user.consultation.specialist', compact('veterinarians', 'specialist'))->with('breadcrumbs', $this->breadcrumbs);
    }
    private function prepareVeterinarianView($id, $viewName)
    {
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => 'Veterinarian Details', 'url' => route('user.consultation.veterinarian', ['id' => $id])]));

        $now = $this->currentDateTime;
        $veterinarians = Veterinarian::with(['serviceSchedules' => function ($query) use ($now) {
            $query->where('is_reserved', false)
                ->where('schedule_start', '<=', $now)
                ->where('schedule_end', '>=', $now);
        }])->where('id',$id)->get();
        return view($viewName, compact('veterinarians'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function getVeterinarianDetails($id)
    {
        return $this->prepareVeterinarianView($id, 'pages.user.consultation.veterinarian');
    }

    public function getVeterinarianOrderDetails($id)
    {
        return $this->prepareVeterinarianView($id, 'pages.user.consultation.order');
    }
}

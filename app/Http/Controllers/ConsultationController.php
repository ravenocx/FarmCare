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
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Consultation', 'url' => 'user.consultation'],
        ];
        $this->currentDateTime = Carbon::now();
    }
    public function index()
    {
        
        $veterinariansRecommendation = Veterinarian::orderBy('id', 'DESC')->limit(2)->get() ;
        $veterinariansBySpecialist = Veterinarian::orderBy('specialist')
        ->get()
        ->groupBy('specialist')
        ->map(function ($group) {
            return $group->take(3); // Limit to 3 veterinarians per specialist
        });


        return view('pages.user.consultation.index', compact('veterinariansRecommendation', 'veterinariansBySpecialist'))->with('breadcrumbs', $this->breadcrumbs);
    }

    public function getDoctorBySpecialist($specialist)
    {

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
        $veterinarian = Veterinarian::findOrFail($id);
        return view($viewName, compact('veterinarian'))->with('breadcrumbs', $this->breadcrumbs);
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

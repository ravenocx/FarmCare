<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;

class ConsultationController extends Controller
{
    private $breadcrumbs;
    public function __construct()
    {
        $this->breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Consultation', 'url' => 'user.consultation'],
        ];
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

        $veterinarians = Veterinarian::orderBy('id','DESC')->where('specialist', $specialist)->paginate(15);

        return view('pages.user.consultation.specialist', compact('veterinarians'))->with('breadcrumbs', $this->breadcrumbs);
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

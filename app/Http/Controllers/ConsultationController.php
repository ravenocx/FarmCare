<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinarian;

class ConsultationController extends Controller
{
    public function index()
    {
        // Breadcrumbs
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Consultation', 'url' => 'user.consultation'],
        ];

        $veterinariansRecommendation = Veterinarian::orderBy('id', 'DESC')->limit(2)->get() ;
        $veterinariansBySpecialist = Veterinarian::orderBy('specialist')
        ->get()
        ->groupBy('specialist')
        ->map(function ($group) {
            return $group->take(3); // Limit to 3 veterinarians per specialist
        });


        return view('pages.user.consultation.index', compact('breadcrumbs', 'veterinariansRecommendation', 'veterinariansBySpecialist'));
    }

    public function getDoctorBySpecialist($specialist)
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Consultation', 'url' => 'user.consultation'],
        ];

        $veterinarians = Veterinarian::orderBy('id','DESC')->where('specialist', $specialist)->paginate(15);


        return view('pages.user.consultation.specialist', compact('breadcrumbs', 'veterinarians'));
    }
}

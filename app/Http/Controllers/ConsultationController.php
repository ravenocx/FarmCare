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
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Consultation', 'url' => null],
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
}

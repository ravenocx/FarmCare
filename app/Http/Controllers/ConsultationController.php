<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function showPage()
    {
        // Example data for header
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'home'],
            ['label' => 'Consultation', 'url' => null],
        ];

        $userName = 'Alexander Grahambell';

        return view('consultation', compact('breadcrumbs','userName'));
    }
}

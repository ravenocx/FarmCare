<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function showPage()
    {
        // Example data for header
        $breadcrumbs = [
            ['label' => 'Home', 'url' => '/'],
            ['label' => 'Consultation', 'url' => null],
        ];

        $userName = 'Alexander Grahambell';

        return view('pages.user.consultation.index')->with([
            'breadcrumbs' => $breadcrumbs,
            'userName' => $userName
        ]);
    }
}

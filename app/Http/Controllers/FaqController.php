<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function getFAQPage(){
        $breadcrumbs = [
            ['label' => 'Home', 'url' => route('user.home')],
            ['label' => 'FAQ', 'url' => route('faq')],
        ];

        return view('pages.faq.index', compact('breadcrumbs'));
    }
}

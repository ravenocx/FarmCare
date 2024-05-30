<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class VeterProfileController extends Controller
{
    public function showProfile()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Profile', 'url' => 'user.profile'],
        ];

        $veterinarian = Auth::guard('veterinarian')->user();
        return view('pages.veterinarian.profile.index', compact('breadcrumbs','veterinarian'));
    }

    public function editProfileForm()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Profile', 'url' => 'user.profile'],
            ['label' => 'Edit', 'url' => 'user.profile.edit.form'],
        ];
        $veterinarian = Auth::guard('veterinarian')->user();
        return view('pages.veterinarian.profile.edit', compact('breadcrumbs','veterinarian'));
    }

 
}
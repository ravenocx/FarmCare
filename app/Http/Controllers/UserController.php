<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Profile', 'url' => 'user.profile'],
        ];

        $user = Auth::guard('user')->user();
        return view('pages.user.profile.index', compact('breadcrumbs','user'));
    }

    public function editProfileForm()
    {
        $breadcrumbs = [
            ['label' => 'Home', 'url' => 'user.home'],
            ['label' => 'Profile', 'url' => 'user.profile'],
            ['label' => 'Edit', 'url' => 'user.profile.edit.form'],
        ];
        $user = Auth::guard('user')->user(); // Ambil data pengguna yang sedang login
        return view('pages.user.profile.edit', compact('breadcrumbs','user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('user')->user(); // Ambil data pengguna yang sedang login
        $user->update($request->all()); // Update data profil dengan data yang dikirimkan dari form

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }
}

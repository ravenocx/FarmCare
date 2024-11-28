<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Veterinarian;
use App\Models\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  
    public function index()
    {
      $veterinarians = Veterinarian::limit(18)->get();

      $articles = Article::with('articleImages')->limit(4)->get();
      return view('pages.user.dashboard.index', compact('veterinarians', 'articles'));
    }

    public function listVeterinarians()
    {
      $veterinarians = Veterinarian::all();
      return view('pages.user.dashboard.list', compact('veterinarians'));
    }
}
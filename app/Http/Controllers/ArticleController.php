<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        try {
            $article = Article::create([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'creator' => Auth::guard('user')->user()->id,
            ]);

            error_log($article->id);

            // Menyimpan setiap gambar
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imageName = time() . '.' . $image->extension();
                    $image->move(public_path('images'), $imageName);
                }
            }

            return redirect()->route('article.index')->with('message', 'Article has been created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}

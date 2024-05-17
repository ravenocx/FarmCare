<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $request->validate([
                'title' => 'required|string',
                'category' => 'required|string',
                'content' => 'required|string',
            ]);

            $filenameExt = $request->file('photo1')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('photo1')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('photo1')->storeAs('public/articlePhoto', $filenameSave);
            
            $filenameExt2 = $request->file('photo2')->getClientOriginalName();
            $filename2 = pathinfo($filenameExt2, PATHINFO_FILENAME);
            $extension2 = $request->file('photo2')->getClientOriginalExtension();
            $filenameSave2 = $filename2.'_'.time().'.'.$extension2;
            $request->file('photo2')->storeAs('public/articlePhoto', $filenameSave2);
            
            $filenameExt3 = $request->file('photo3')->getClientOriginalName();
            $filename3 = pathinfo($filenameExt3, PATHINFO_FILENAME);
            $extension3 = $request->file('photo3')->getClientOriginalExtension();
            $filenameSave3 = $filename3.'_'.time().'.'.$extension3;
            $request->file('photo3')->storeAs('public/articlePhoto', $filenameSave3);
            
            $filenameExt4 = $request->file('photo4')->getClientOriginalName();
            $filename4 = pathinfo($filenameExt4, PATHINFO_FILENAME);
            $extension4 = $request->file('photo4')->getClientOriginalExtension();
            $filenameSave4 = $filename4.'_'.time().'.'.$extension4;
            $request->file('photo4')->storeAs('public/articlePhoto', $filenameSave4);
            
            Article::create([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
            ]);

            return redirect()->route('article.index')->with('message', 'Article has been created successfully');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);

        if($request->file('photo1')){
             if(Storage::disk('public')->exists('articlePhoto/'. $article->photo1)){
                Storage::disk('public')->delete('articlePhoto/'. $article->photo1);
            }
            $filenameExt = $request->file('photo1')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('photo1')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('photo1')->storeAs('public/articlePhoto', $filenameSave);

            $article->update(['photo1' => $filenameSave]);
        }
        if($request->file('photo2')){
             if(Storage::disk('public')->exists('articlePhoto/'. $article->photo2)){
                Storage::disk('public')->delete('articlePhoto/'. $article->photo2);
            }
            $filenameExt = $request->file('photo2')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('photo2')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('photo2')->storeAs('public/articlePhoto', $filenameSave);

            $article->update(['photo2' => $filenameSave]);
        }
        if($request->file('photo3')){
             if(Storage::disk('public')->exists('articlePhoto/'. $article->photo3)){
                Storage::disk('public')->delete('articlePhoto/'. $article->photo3);
            }
            $filenameExt = $request->file('photo3')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('photo3')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('photo3')->storeAs('public/articlePhoto', $filenameSave);

            $article->update(['photo3' => $filenameSave]);
        }
        if($request->file('photo4')){
             if(Storage::disk('public')->exists('articlePhoto/'. $article->photo4)){
                Storage::disk('public')->delete('articlePhoto/'. $article->photo4);
            }
            $filenameExt = $request->file('photo4')->getClientOriginalName();
            $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
            $extension = $request->file('photo4')->getClientOriginalExtension();
            $filenameSave = $filename.'_'.time().'.'.$extension;
            $request->file('photo4')->storeAs('public/articlePhoto', $filenameSave);

            $article->update(['photo4' => $filenameSave]);
        }

        $article->update([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
        ]);

        return redirect()->route('article.index')->with('message', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if(Storage::disk('public')->exists('articlePhoto/'. $article->photo1)){
            Storage::disk('public')->delete('articlePhoto/'. $article->photo1);
        }
        if(Storage::disk('public')->exists('articlePhoto/'. $article->photo2)){
            Storage::disk('public')->delete('articlePhoto/'. $article->photo2);
        }
        if(Storage::disk('public')->exists('articlePhoto/'. $article->photo3)){
            Storage::disk('public')->delete('articlePhoto/'. $article->photo3);
        }
        if(Storage::disk('public')->exists('articlePhoto/'. $article->photo4)){
            Storage::disk('public')->delete('articlePhoto/'. $article->photo4);
        }
        $article->delete();

        return redirect()->back()->with('message', 'Article deleted successfully');
    }
}

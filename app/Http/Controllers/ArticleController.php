<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['articleImages' => function ($query) {
            $query->limit(1);
        }])
        ->where('creator', Auth::guard('veterinarian')->user()->id)
        ->get();
        return view('pages.veterinarian.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.veterinarian.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    private $articleId;

    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required|string',
                'category' => 'required|string',
                'content' => 'required|string',
                'photo' => 'mimes:png,jpeg,jpg',
            ]);

            $latestArticle = Article::orderBy('id' , 'desc')->first();
            if (!$latestArticle) {
                $articleId = 1;
            }else {
                $articleId = $latestArticle->id + 1;
            }

            $currentDateTime = Carbon::now();
            

            if ($request->hasFile('photo')){
                $photo = $request->file('photo')->getRealPath();
                // Set the file name
                $photoFileName = 'Article-' . $articleId . ' Image' . '_' . Auth::guard('veterinarian')->user()->name . $currentDateTime;
        
                $imageUrl = cloudinary()->upload($photo, [
                    'public_id' => $photoFileName,
                    'folder' => 'article_images', 
                ])->getSecurePath();
            }

            $article = Article::create([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'creator' => Auth::guard('veterinarian')->user()->id
            ]);


            ArticleImage::create([
                'article_id' => $article->id,
                'image'=> $imageUrl,
            ]);


            return redirect()->route('veterinarian.article.index')->with('message', 'Article has been created successfully');
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
        $article = Article::with('articleImages')->findOrFail($id);

        return view('pages.veterinarian.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        set_time_limit(300);

        try{
            $request->validate([
                'title' => 'required|string',
                'category' => 'required|string',
                'content' => 'required|string',
                'photo' => 'mimes:png,jpeg,jpg',
            ]);

            $currentDateTime = Carbon::now();
            
            $imageUrl = null;
            if ($request->hasFile('photo')){
                $photo = $request->file('photo')->getRealPath();
                // Set the file name
                $photoFileName = 'Article-' . $id . '_Image-'  . '_' . Auth::guard('veterinarian')->user()->name . $currentDateTime;
                
                $imageUrl = cloudinary()->upload($photo, [
                    'public_id' => $photoFileName,
                    'folder' => 'article_images', 
                    ])->getSecurePath();
            }


            $article = Article::findOrFail($id);

            $article->update([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content
            ]);

            if ($imageUrl) {
                $articleImage = ArticleImage::where('article_id', $id)->first();
    
                if ($articleImage) {
                    $articleImage->update([
                        'image' => $imageUrl,
                    ]);
                }
            }
    
            return redirect()->route('veterinarian.article.index')->with('message', 'Article has been updated successfully');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            
            $article = Article::findOrFail($id);

            $articleImages = ArticleImage::where('article_id', $id)->get();

            foreach($articleImages as $articleImage){
                $articleImage -> delete();
            }
            $article -> delete();
            return redirect()->back()->with('message', 'Article deleted successfully');
        }catch(\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
        

    }
}
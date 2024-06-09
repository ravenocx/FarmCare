<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserArticleController extends Controller
{
    private $breadcrumbs;
    private $currentDateTime;
    public function __construct()
    {
            $this->breadcrumbs = [
                ['label' => 'Home', 'url' => route('user.home')],
                ['label' => 'Article', 'url' => route('user.article')],
            ];
            $this->currentDateTime = Carbon::now();
    }
    
    public function index(Request $request){
        try{
            $articles = Article::with('articleImages')->get();
            
            $filter = "";
            if($request->search){
                $articles = Article::where('title', 'like', "%{$request->search}%")
                  ->orWhere('category', 'like', "%{$request->search}%")->get();
            }

            if($request->query('filter')){
                $filter = $request->query('filter');
                $articles = Article::where('category', $request->query('filter'))->get();
            }
            return view('pages.user.article.index', compact('articles', 'filter'))->with('breadcrumbs', $this->breadcrumbs);;
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }
    public function detail(string $id){
        try{        
            $article = Article::with('articleImages')->find($id);
            $this->breadcrumbs = array_merge($this->breadcrumbs, array(['label' => $article->title, 'url' => route('user.consultation.specialist' , ['specialist' => $article->title])]));
            
            $carbonTanggal = Carbon::parse($article->created_at);
            $carbonTanggal->locale('id');
            $article->formattedDate = $carbonTanggal->isoFormat('D MMMM YYYY');
            return view('pages.user.article.detail', compact('article'))->with('breadcrumbs', $this->breadcrumbs);;
            }
            catch(ModelNotFoundException $e){
                abort(404);
            }
    }
}


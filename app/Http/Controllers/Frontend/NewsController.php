<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Major;
use App\Repositories\ArticleRepository;

class NewsController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    
    public function index(Request $request)
    {
        $articles = $this->articleRepository->get([
            'order' => 'created_at DESC',
            'pagination' => 3,
            'search' => [
                'title' => $request->search_title
            ]
        ]);
        $majors = Major::all();
        $categories = Category::all();
        
        return view('frontend.news.index', [
            'articles' => $articles,
            'majors' => $majors,
            'categories'=> $categories
        ]);
    }

    public function articleCategory($slug)
    {
        $majors = Major::all();
        $categories = Category::all(); 
        $category = Category::where('slug', $slug)->first();

        return vieW('frontend.news.show-category', [
            'category' => $category,
            'articles' => $category->articles,
            'majors' => $majors,
            'categories' => $categories
        ]);
    }

    public function detailBerita(Article $article)
    {
        $categories = Category::all(); 
        $majors = Major::all();

        return view('frontend.news.show', [
            'article' => $article,
            'majors' => $majors,
            'categories' => $categories
        ]);
    }

}

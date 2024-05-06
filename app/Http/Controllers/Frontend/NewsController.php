<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Major;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;

class NewsController extends Controller
{
    private $articleRepository;
    private $categoryRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
    }
    
    public function index(Request $request)
    {
        $majors = Major::all();
        $articles = $this->articleRepository->get([
            'order' => 'created_at DESC',
            'pagination' => 3,
            'search' => [
                'title' => $request->search_title
            ]
        ]);
        $categories = $this->categoryRepository->get([
            'order' => 'id asc'
        ]);
        
        return view('frontend.news.index', [
            'articles' => $articles,
            'majors' => $majors,
            'categories'=> $categories
        ]);
    }

    public function articleCategory(Request $request, $slug)
    {
        $majors = Major::all();
        $category = Category::where('slug', $slug)->first();
        $categories = $this->categoryRepository->get([
            'order' => 'id asc'
        ]);
     
        return vieW('frontend.news.show-category', [
            'category' => $category,
            'articles' => $category->articles,
            'majors' => $majors,
            'categories' => $categories,
        ]);
    }

    public function detailBerita(Article $article)
    {
        $majors = Major::all();
        $categories = $this->categoryRepository->get([
            'order' => 'id asc'
        ]);
        
        return view('frontend.news.show', [
            'article' => $article,
            'majors' => $majors,
            'categories' => $categories
        ]);
    }

}

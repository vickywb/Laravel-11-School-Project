<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Article;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HeroPage;
use App\Models\Major;

class HomeController extends Controller
{
   public function index()
   {  
      $articles = Article::latest('id')->paginate(2);
      $teachers = Teacher::orderBy('name', 'asc')->paginate(4);
      $majors = Major::orderBy('title', 'asc')->get();
      $heroPages = HeroPage::all();

      return view('home', [
         'articles' => $articles,
         'teachers' => $teachers,
         'majors' => $majors,
         'heroPages' => $heroPages
      ]);
   }
}

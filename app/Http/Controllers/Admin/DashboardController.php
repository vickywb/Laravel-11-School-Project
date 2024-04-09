<?php

namespace App\Http\Controllers\Admin;

use App\Models\Major;
use App\Models\Article;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $articles = Article::all();
        $majors = Major::all();
        $students = Student::all();

        return view('admin.index', [
            'teachers' => $teachers,
            'articles' => $articles,
            'majors' => $majors,
            'students' => $students,
        ]);
    }
}
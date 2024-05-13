<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Repositories\TeacherRepository;

class TeacherController extends Controller
{
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }
    
    public function index(Request $request)
    {
        $teachers = $this->teacherRepository->get([
            'order' => 'name ASC',
            'pagination' => 12,
            'search' => [
                'name' => $request->search_name
            ]
        ]);

        $majors = Major::all();

        return view('frontend.teachers.index', [
            'teachers' => $teachers,
            'majors' => $majors
        ]);
    }
}

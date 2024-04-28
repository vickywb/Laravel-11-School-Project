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
    
    public function index()
    {
        $teachers = $this->teacherRepository->get([
            'order' => 'name ASC',
            'pagination' => 4
        ]);

        $majors = Major::all();

        return view('frontend.teachers.index', [
            'teachers' => $teachers,
            'majors' => $majors
        ]);
    }
}

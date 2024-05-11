<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class StudentController extends Controller implements HasMiddleware
{
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public static function middleware(): array
    {
        return [
             new Middleware('role:superadmin|admin', only: ['create', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        $students = $this->studentRepository->get([
            'order' => 'created_at desc',
            'search' => [
                'name' => $request->search_name
            ],
            'pagination' => 5
        ]);

        return view('admin.student.index', [
            'students' => $students
        ]);
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(StudentStoreRequest $request, Student $student)
    {
        $data = $request->only([
            'name', 'nisn', 'gender', 'religion', 'place_of_birth', 'date_of_birth',
            'address', 'phone_number', 'origin_of_school', 'address_of_school',
            'father_name', 'mother_name', 'father_job', 'mother_job', 
            'phone_number_parent'
        ]);

        try {
            DB::beginTransaction();

            $student = new Student($data);
            $student = $this->studentRepository->store($student);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.student.index')->with([
            'success' => 'New Student successfully created.'
        ]);
    }

    public function show(Student $student)
    {
        return view('admin.student.detail', [
            'student' => $student
        ]);
    }

    public function edit(Student $student)
    {
        return view('admin.student.edit', [
            'student' => $student
        ]);
    }

    public function update(StudentUpdateRequest $request, Student $student)
    {
        $data = $request->only([
            'name', 'nisn', 'gender', 'religion', 'place_of_birth', 'date_of_birth',
            'address', 'phone_number', 'origin_of_school', 'address_of_school',
            'father_name', 'mother_name', 'father_job', 'mother_job', 
            'phone_number_parent'
        ]);

        try {
            DB::beginTransaction();

            $student = $student->fill($data);
            $student = $this->studentRepository->store($student);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }
        
        return redirect()->route('admin.student.index')->with([
            'success' => 'Student has been successfully updated.'
        ]);
    }

    public function destroy(Student $student)
    {
        try {
            DB::beginTransaction();

            $student->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.student.index')->with([
            'success' => 'Student has been successfully deleted.'
        ]);
    }
}


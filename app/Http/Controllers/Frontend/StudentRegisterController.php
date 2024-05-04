<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\StudentRepository;
use App\Http\Requests\StudentStoreRequest;

class StudentRegisterController extends Controller
{   
    private $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function create()
    {
        $majors = Major::all();
        return view('frontend.student.create', [
            'majors' => $majors
        ]);
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

        return redirect()->route('form.pendaftaran')->with([
            'success' => 'Selamat, Anda telah terdaftar sebagai murid disekolah ini.'
        ]);
    }
}
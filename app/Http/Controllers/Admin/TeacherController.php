<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherStoreRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\File;
use App\Repositories\FileRepository;
use App\Repositories\TeacherRepository;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    private $teacherRepository;
    private $fileRepository;

    public function __construct(
        TeacherRepository $teacherRepository,
        FileRepository $fileRepository
    )
    {
        $this->teacherRepository = $teacherRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index(Request $request)
    {
        $teachers = $this->teacherRepository->get([
            'order' => 'name asc',
            'search' => [
                'name' => $request->search_name
            ],
            'pagination' => 5
        ]);

        return view('admin.teacher.index',[ 
            'teachers' => $teachers
        ]);
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(TeacherStoreRequest $request, Teacher $teacher)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'teacher/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);
        }

        $data = $request->only([
            'name', 'file', 'file_id', 'field_of_study', 'address', 'phone_number'
        ]);

        try {
            DB::beginTransaction();

            $teacher = new Teacher($data);
            $teacher = $this->teacherRepository->store($teacher);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.teacher.index')->with([
            'success' => 'New Teacher successfully created.'
        ]);
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit', [
            'teacher'=> $teacher
        ]);
    }

    public function update(TeacherUpdateRequest $request, Teacher $teacher)
    {
        //Get File which not in relation
        $files = File::select('id', 'location')
            ->doesntHave('articles')
            ->doesntHave('majors')
            ->doesntHave('teachers')
            ->get();

        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'teacher/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);

            if ($teacher->file_id) {
                $oldFileName = $teacher->file->location;
            }
            
            //Check File is empty or not
            if (!$files->isEmpty()) {
                //File which not in relation will be execute 
                foreach ($files as $file) {
                    $file->delete();
                }
            }
        }

        $data = $request->only([
            'name', 'file', 'file_id', 'field_of_study', 'address', 'phone_number'
        ]);

        try {
            DB::beginTransaction();

            $teacher = $teacher->fill($data);
            $teacher = $this->teacherRepository->store($teacher);

            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.teacher.index')->with([
            'success' => 'Teacher has been successfully updated.'
        ]);
    }

    public function destroy(Teacher $teacher)
    {
        try {
            DB::beginTransaction();

            if ($teacher->file_id) {
                $oldFileName = $teacher->file->location;
            }

            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }

            $file = File::find($teacher->file->id)->delete();
            $teacher->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.teacher.index')->with([
            'success' => 'Teacher has been successfully deleted.'
        ]);
    }
}

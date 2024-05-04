<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Major;
use App\Helpers\UploadFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use App\Repositories\MajorRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MajorStoreRequest;
use App\Http\Requests\MajorUpdateRequest;
use App\Models\FieldOfWork;
use App\Models\LearnedMaterial;
use App\Repositories\FieldOfWorkRepository;
use App\Repositories\LearnedMaterialRepository;

class MajorController extends Controller
{
    private $majorRepository;
    private $fileRepository;
    private $learnedMaterialRepository;
    private $fieldOfWorkRepository;

    public function __construct(
        MajorRepository $majorRepository,
        FileRepository $fileRepository,
        LearnedMaterialRepository $learnedMaterialRepository,
        FieldOfWorkRepository $fieldOfWorkRepository,
    )
    {
        $this->majorRepository = $majorRepository;
        $this->fileRepository = $fileRepository;
        $this->learnedMaterialRepository = $learnedMaterialRepository;
        $this->fieldOfWorkRepository = $fieldOfWorkRepository;
    }

    public function index(Request $request)
    {
        $major = $this->majorRepository->get([
            'order' => 'title asc',
            'search' => [
                'title' => $request->search_title
            ],
            'pagination' => 5
        ]);

        return view('admin.major.index', [
            'majors' => $major
        ]);
    }

    public function create()
    {
        return view('admin.major.create');
    }

    public function store(MajorStoreRequest $request, Major $major)
    {
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'major/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);
        }

        $data = $request->only([
            'title', 'slug', 'file_id', 'file', 'description'
        ]);

        try {
            DB::beginTransaction();

            $major = new Major($data);
            $major = $this->majorRepository->store($major);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.major.index')->with([
            'success', 'New Major successfully created.'
        ]);
    }
    
    public function edit(Major $major)
    {
        return view('admin.major.edit', [
            'major' => $major
        ]);
    }

    public function update(MajorUpdateRequest $request, Major $major)
    {
        //Get File which not in relation
        $files = File::select('id', 'location')
            ->doesntHave('articles')
            ->doesntHave('majors')
            ->doesntHave('teachers')
            ->doesntHave('galleries')
            ->get();

        
        $request->merge([
            'title' => Str::slug($request->title)
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'major/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);

            if ($major->file_id) {
                $oldFileName = $major->file->location;
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
            'title', 'slug', 'file_id', 'file', 'description'
        ]);

        try {
            DB::beginTransaction();

            $major = $major->fill($data);
            $major = $this->majorRepository->store($major);

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

        return redirect()->route('admin.major.index')->with([
            'success', 'Major has been successfully updated.'
        ]);
    }

    public function destroy(Major $major)
    {
        try {
            DB::beginTransaction();

            if ($major->file_id) {
                $oldFileName = $major->file->location;
            }

            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }

            $file = File::find($major->file->id)->delete();
            $major->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.major.index')->with([
            'success', 'Major has been successfully deleted.'
        ]);
    }

    public function show(Major $major)
    {
        $fieldOfWork = FieldOfWork::all();
        $learnedMaterial = LearnedMaterial::all();

        return view('admin.major.detail', [
            'major' => $major,
            'fieldOfWork' => $fieldOfWork,
            'learnedMaterial' => $learnedMaterial
        ]);
    }

    public function createLearnedMaterial(Major $major)
    {
        return view('admin.major.learned-material', [
            'major' => $major,
        ]);
    }
    
    public function storeLearnedMaterial(Request $request, Major $major, LearnedMaterial $learnedMaterial)
    {
        $request->merge([
            'major_id' => $major->id
        ]);

        $data = $request->only([
            'major_id', 'title'
        ]);

        try {
            DB::beginTransaction();

            $learnedMaterial = new LearnedMaterial($data);
            $learnedMaterial = $this->learnedMaterialRepository->store($learnedMaterial);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }
        
        return redirect()->route('admin.major.detail', $major)->with([
            'success', 'New Learned Material successfully created.'
        ]);
    }

    public function createFieldOfWork(Major $major)
    {
        return view('admin.major.field-of-work', [
            'major' => $major
        ]);
    }

    public function storeFieldOfWork(Request $request, Major $major, FieldOfWork $fieldOfWork)
    {
        $request->merge([
            'major_id' => $major->id
        ]);

        $data = $request->only([
            'major_id', 'title'
        ]);

        try {
            DB::beginTransaction();

            $fieldOfWork = new FieldOfWork($data);
            $fieldOfWork = $this->fieldOfWorkRepository->store($fieldOfWork);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }
        
        return redirect()->route('admin.major.detail', $major)->with([
            'success', 'New Field of Work successfully created.'
        ]);
    }

    public function deleteLearnedMaterial(Major $major, LearnedMaterial $learnedMaterial)
    {
        try {
            DB::beginTransaction();

            $learnedMaterial->delete();
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }
        
        return redirect()->route('admin.major.detail', $major)->with([    
            'success', 'Learned Material successfully deleted.'
        ]);
    }

    public function deleteFieldOfWork(Major $major, FieldOfWork $fieldOfWork)
    {
        try {
            DB::beginTransaction();

            $fieldOfWork->delete();
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }
        
        return redirect()->route('admin.major.detail', $major)->with([
            'success', 'Field of Work successfully deleted.'
        ]);
    }
}

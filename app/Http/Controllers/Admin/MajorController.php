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

class MajorController extends Controller
{
    private $majorRepository;
    private $fileRepository;

    public function __construct(
        MajorRepository $majorRepository,
        FileRepository $fileRepository
    )
    {
        $this->majorRepository = $majorRepository;
        $this->fileRepository = $fileRepository;
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
}

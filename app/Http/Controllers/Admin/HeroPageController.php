<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Category;
use App\Models\HeroPage;
use App\Helpers\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use Illuminate\Support\Facades\Storage;
use App\Repositories\HeroPageRepository;

class HeroPageController extends Controller
{
    private $heroPageRepository;
    private $fileRepository;


    public function __construct(
        HeroPageRepository $heroPageRepository,
        FileRepository $fileRepository
    )
    {
        $this->heroPageRepository = $heroPageRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index(Request $request)
    {
        $heroPages = $this->heroPageRepository->get([
            'order' => 'created_at desc',
        ]);

        return view('admin.hero-page.index', [
            'heroPages' => $heroPages
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.hero-page.create', [
            'categories'=> $categories
        ]);
    }

    public function store(Request $request, HeroPage $heroPage)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'hero-page/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);
        }

        $data = $request->only([
            'title', 'description', 'file_id', 'file'
        ]);
        
        try {
            DB::beginTransaction();

            $heroPage = new HeroPage($data);
            $heroPage = $this->heroPageRepository->store($heroPage);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.heroPage.index')->with([
            'success', 'New Hero Page successfully created.'
        ]);
    }

    public function edit(HeroPage $heroPage)
    {
        $categories = Category::all();
        return view('admin.hero-page.edit', [
            'heroPage'=> $heroPage,
            'categories'=> $categories
        ]);
    }

    public function update(Request $request, HeroPage $heroPage)
    {
        //Get File which not in relation
        $files = File::select('id', 'location')
            ->doesntHave('articles')
            ->doesntHave('majors')
            ->doesntHave('teachers')
            ->doesntHave('galleryFiles')
            ->doesntHave('heroPages')
            ->get();

        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file,[
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'hero-page/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);

            if ($heroPage->file_id) {
                $oldFileName = $heroPage->file->location;
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
            'title', 'file_id', 'file', 'description'
        ]);

        try {
            DB::beginTransaction();

            $heroPage = $heroPage->fill($data);
            $heroPage = $this->heroPageRepository->store($heroPage);

            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.heroPage.index')->with([
            'success' => 'Hero Page has been successfully updated.'
        ]);
    }

    public function destroy(HeroPage $heroPage)
    {
        try {
            DB::beginTransaction();

            //Check is file exist
            if ($heroPage->file_id) {
                $oldFileName = $heroPage->file->location;
            }

            //Delete the existing file in the storage
            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }

            $file = File::find($heroPage->file->id)->delete();
            $heroPage->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.heroPage.index')->with([
            'success' => 'Hero Page has been successfully deleted.'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Models\Gallery;
use App\Helpers\UploadFile;
use App\Models\GalleryFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use App\Repositories\GalleryRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\GalleryStoreRequest;
use App\Http\Requests\GalleryUpdateRequest;

class GalleryController extends Controller
{
    private $galleryRepository;
    private $fileRepository;

    public function __construct(
        GalleryRepository $galleryRepository,
        FileRepository $fileRepository
    )
    {
        $this->galleryRepository = $galleryRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index()
    {
        $galleries = $this->galleryRepository->get([
            'pagination' => 5
        ]);

        return view('admin.gallery.index', [
            'galleries' => $galleries
        ]);
    }

    public function create()
    {
        $categoryImages = CategoryImage::all();

        return view('admin.gallery.create', [
            'categoryImages' => $categoryImages 
        ]);
    }

    public function store(GalleryStoreRequest $request, Gallery $gallery)
    {
        $listImages = [];

        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->only([
            'category_image_id', 'title', 'slug',
        ]);

        try {
            DB::beginTransaction();

            $gallery = new Gallery($data);
            $gallery = $this->galleryRepository->store($gallery);

            if ($request->hasFile('images')) {
                foreach ($request->images as $image) {

                    new UploadFile($image->get(), [
                        'field_name' => 'location',
                        'extension' => $image->getClientOriginalExtension(),
                        'location' => 'gallery/'
                    ], $request);

                    $uploadedFile = $this->fileRepository->store($request->only('location'));

                    $listImages[] = [
                        'file_id' => $uploadedFile->id,
                        'gallery_id' => $gallery->id 
                    ];
                }
            }
            $gallery->galleries()->createMany($listImages);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.gallery.index')->with([
            'success' => 'New Gallery has successfully created.'
        ]);
    }

    public function show(Gallery $gallery)
    {
        $galleries = GalleryFile::where('gallery_id', $gallery->id)->get();
        return view('admin.gallery.detail', [
            'gallery' => $gallery,
            'galleries' => $galleries
        ]);
    }

    public function edit(Gallery $gallery)
    {
        $categoryImages = CategoryImage::all();

        return view('admin.gallery.edit', [
            'gallery' => $gallery,
            'categoryImages' => $categoryImages
        ]);
    }

    public function update(GalleryUpdateRequest $request, Gallery $gallery)
    {
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->only([
            'category_image_id', 'title', 'slug',
        ]);

        try {
            DB::beginTransaction();
            
            $gallery = $gallery->fill($data);
            $gallery = $this->galleryRepository->store($gallery);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.gallery.index')->with([
            'success' => 'Gallery has been successfully updated.'
        ]);
    }
    
    public function destroy(Gallery $gallery)
    {
        try {
            DB::beginTransaction();

            $gallery->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.gallery.index')->with([
            'success' => 'Gallery has been deleted.'
        ]);
    }

    public function storeImage(Request $request, Gallery $gallery, galleryFile $galleryFile)
    {
        $listImages = [];

        $data = $request->only([
            'file_id', 'gallery_id'
        ]);

        try {
            DB::beginTransaction();

            if ($request->hasFile('images')) {
                foreach ($request->images as $image) {

                    new UploadFile($image->get(), [
                        'field_name' => 'location',
                        'extension' => $image->getClientOriginalExtension(),
                        'location' => 'gallery/'
                    ], $request);

                    $uploadedFile = $this->fileRepository->store($request->only('location'));

                    $listImages[] = [
                        'file_id' => $uploadedFile->id,
                        'gallery_id' => $gallery->id 
                    ];
                }
            }

            $gallery->galleries()->createMany($listImages);

            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.gallery.detail', $gallery)->with([
            'success' => 'New Image successfully created.'
        ]);
    }

    public function deleteImage(Gallery $gallery, GalleryFile $galleryFile)
    {
        $files = File::select('id', 'location')
            ->doesntHave('articles')
            ->doesntHave('majors')
            ->doesntHave('teachers')
            ->doesntHave('galleries')
            ->get();

        try {
            DB::beginTransaction();

            if ($galleryFile->file_id) {
                $oldFileName = $galleryFile->file->location;
            }

            //Delete the existing file in the storage
            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }
           
            //Check File is empty or not
            if (!$files->isEmpty()) {
                //File which not in relation will be execute 
                foreach ($files as $file) {
                    $file->delete();
                }
            }

            $file = File::find($galleryFile->file->id)->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.gallery.detail', $gallery)->with([
            'success' => 'Image has been deleted.'
        ]);
    }
}

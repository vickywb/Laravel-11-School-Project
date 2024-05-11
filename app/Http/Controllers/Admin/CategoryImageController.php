<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryImageRepository;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryImageController extends Controller implements HasMiddleware
{
    private $categoryImageRepository;

    public function __construct(CategoryImageRepository $categoryImageRepository)
    {
        $this->categoryImageRepository = $categoryImageRepository;
    }
    
    public static function middleware(): array
    {
        return [
             new Middleware('role:superadmin|admin', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $categoryImages = $this->categoryImageRepository->get([
            'order' => 'title asc',
            'pagination' => 5,
            'search' => [
                'title' => $request->search_title
            ]
        ]);

        return view('admin.categoryImage.index', [
            'categoryImages' => $categoryImages
        ]);
    }

    public function create()
    {
        return view('admin.categoryImage.create');
    }

    public function store(Request $request, CategoryImage $categoryImage)
    {
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->only([
            'title', 'slug'
        ]);

        try {
            DB::beginTransaction();

            $categoryImage = new CategoryImage($data);
            $categoryImage = $this->categoryImageRepository->store($categoryImage);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.categoryImage.index')->with([
            'success' => 'New Category Image has successfully created.'
        ]);
    }

    public function edit(CategoryImage $categoryImage)
    {
        return view('admin.categoryImage.edit', [
            'categoryImage' => $categoryImage
        ]);
    }

    public function update(Request $request, CategoryImage $categoryImage)
    {   
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->only([
            'title', 'slug'
        ]);

        try {
            DB::beginTransaction();

            $categoryImage = $categoryImage->fill($data);
            $categoryImage = $this->categoryImageRepository->store($categoryImage);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.categoryImage.index')->with([
            'success' => 'Category Image has been successfully updated.'
        ]);
    }

    public function destroy(CategoryImage $categoryImage)
    {
        try {
            DB::beginTransaction();

            $categoryImage->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.categoryImage.index')->with([
            'success' => 'Category Image has been successfully deleted.'
        ]);
    }
}

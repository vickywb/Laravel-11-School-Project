<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryImage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryImageRepository;

class CategoryImageController extends Controller
{
    private $categoryImageRepository;

    public function __construct(CategoryImageRepository $categoryImageRepository)
    {
        $this->categoryImageRepository = $categoryImageRepository;
    }

    public function index()
    {
        $categoryImages = $this->categoryImageRepository->get([
            'pagination' => 5
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

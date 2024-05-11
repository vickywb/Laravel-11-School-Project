<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CategoryController extends Controller implements HasMiddleware
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public static function middleware(): array
    {
        return [
             new Middleware('role:superadmin|admin', only: ['destroy']),
        ];
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->get([
            'order' => 'title asc',
            'pagination' => 5,
            'search' => [
                'title' => $request->search_title
            ]
        ]);

        return view('admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryStoreRequest $request, Category $category)
    {
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->only([
            'title', 'slug'
        ]);

        try {
            DB::beginTransaction();

            $category = new Category($data);
            $category = $this->categoryRepository->store($category);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.category.index')->with([
            'success' => 'New Category successfully created.'
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category'=> $category
        ]);
    }

    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        $data = $request->only([
            'title', 'slug'
        ]);

        try {
            DB::beginTransaction();

            $category = $category->fill($data);
            $category = $this->categoryRepository->store($category);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.category.index')->with([
            'success' => 'Category has been successfully updated.'
        ]);
    }

    public function destroy(Category $category)
    {
        try {
            DB::beginTransaction();

            $category->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors', $th->getMessage()
            ]);
        }

        return redirect()->route('admin.category.index')->with([
            'success','Category has been successfully deleted.'
        ]);
    }
}


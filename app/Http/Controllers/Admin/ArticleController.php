<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadFile;
use App\Models\File;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Repositories\FileRepository;
use Illuminate\Validation\Rules\Exists;

class ArticleController extends Controller
{
    private $articleRepository;
    private $fileRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        FileRepository $fileRepository
    )
    {
        $this->articleRepository = $articleRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index(Request $request)
    {
        $articles = $this->articleRepository->get([
            'order' => 'created_at desc',
            'search' => [
                'title' => $request->search_title
            ],
            'pagination' => 5
        ]);

        return view('admin.article.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.article.create', [
            'categories'=> $categories
        ]);
    }

    public function store(ArticleStoreRequest $request, Article $article)
    {
        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file, [
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'article/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);
        }

        $data = $request->only([
            'title', 'description', 'file_id', 'file', 'slug', 'category_id',
        ]);
        
        try {
            DB::beginTransaction();

            $article = new Article($data);
            $article = $this->articleRepository->store($article);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.article.index')->with([
            'success', 'New Article has successfully created.'
        ]);
    }

    public function show(Article $article)
    {
        return view('admin.article.detail', [
            'article'=> $article
        ]);
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.article.edit', [
            'article'=> $article,
            'categories'=> $categories
        ]);
    }

    public function update(ArticleUpdateRequest $request, Article $article)
    {
        //Get File which not in relation
        $files = File::select('id', 'location')
            ->doesntHave('articles')
            ->doesntHave('majors')
            ->doesntHave('teachers')
            ->get();

        $request->merge([
            'slug' => Str::slug($request->title)
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file')->get();

            new UploadFile($file,[
                'field_name' => 'location',
                'extension' => $request->file('file')->getClientOriginalExtension(),
                'location' => 'article/'
            ], $request);

            $uploadedFile = $this->fileRepository->store($request->only('location'));

            $request->merge([
                'file_id' => $uploadedFile->id
            ]);

            if ($article->file_id) {
                $oldFileName = $article->file->location;
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
            'title', 'file_id', 'file', 'description', 'slug', 'category_id'
        ]);

        try {
            DB::beginTransaction();

            $article = $article->fill($data);
            $artile = $this->articleRepository->store($article);

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

        return redirect()->route('admin.article.index')->with([
            'success' => 'Article has been updated.'
        ]);
    }

    public function destroy(Article $article)
    {
        try {
            DB::beginTransaction();

            //Check is file exist
            if ($article->file_id) {
                $oldFileName = $article->file->location;
            }

            //Delete the existing file in the storage
            if (isset($oldFileName)) {
                Storage::delete($oldFileName);
            }

            $file = File::find($article->file->id)->delete();
            $article->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.article.index')->with([
            'success' => 'Article has been successfully deleted.'
        ]);
    }
}


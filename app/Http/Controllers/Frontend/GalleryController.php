<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryFile;
use App\Models\Major;
use App\Repositories\GalleryFileRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private $galleryFileRepository;

    public function __construct(
        GalleryFileRepository $galleryFileRepository
    )
    {
        $this->galleryFileRepository = $galleryFileRepository;
    }
    public function index(Request $request, Gallery $gallery)
    {
        $majors = Major::all();
        $galleryFiles = $this->galleryFileRepository->get([
            'pagination' => 12,
            'search' => [
                'title' => $request->search_category,
            ]
        ]);

        return view('frontend.gallery.index', [
            'majors' => $majors,
            'galleryFiles' => $galleryFiles
        ]);
    }
}

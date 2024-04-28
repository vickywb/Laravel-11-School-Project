<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $majors = Major::all();
        
        return view('frontend.gallery.index', [
            'majors' => $majors
        ]);
    }
}

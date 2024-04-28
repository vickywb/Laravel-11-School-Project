<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Mission;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visions = Vision::all();
        $missions = Mission::all();
        $majors = Major::all();

        return view('frontend.visimisi.index', [
            'visions' => $visions,
            'missions' => $missions,
            'majors' => $majors
        ]);
    }
}

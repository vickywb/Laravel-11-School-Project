<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class StudentRegisterController extends Controller
{
    public function create()
    {
        $majors = Major::all();
        return view('frontend.student.create', [
            'majors' => $majors
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }
}
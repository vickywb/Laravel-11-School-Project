<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MajorRepository;

class MajorController extends Controller
{
    private $majorRepository;

    public function __construct(MajorRepository $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }

    public function index()
    {
        $majors = $this->majorRepository->get([
            'order' => ['title', 'asc']
        ]);

        return view('frontend.navbar', [
            'majors' => $majors
        ]);
    }
    
    public function show(Major $major)
    {
        $majors = Major::all();
        // $major = $this->majorRepository->findByColumn($major->id, 'id');
        $major = Major::where('id', $major->id)->first();
        return view('frontend.major.major-section', [
            'major'=> $major,
            'majors' => $majors
        ]);
    }
}

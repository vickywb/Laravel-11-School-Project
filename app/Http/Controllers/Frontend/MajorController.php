<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FieldOfWork;
use App\Models\LearnedMaterial;
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
        $major = Major::where('id', $major->id)->first();
        $learnedMaterials = LearnedMaterial::where('major_id', $major->id)->get();
        $fieldOfWorks = FieldOfWork::where('major_id', $major->id)->get();

        return view('frontend.major.index', [
            'major'=> $major,
            'majors' => $majors,
            'learnedMaterials' => $learnedMaterials,
            'fieldOfWorks' => $fieldOfWorks
        ]);
    }
}

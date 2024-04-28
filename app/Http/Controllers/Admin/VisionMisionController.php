<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use App\Models\Vision;
use App\Repositories\MissionRepository;
use App\Repositories\VisionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisionMisionController extends Controller
{
    private $visionRepository;
    private $missionRepository;

    public function __construct(
        VisionRepository $visionRepository,
        MissionRepository $missionRepository
    )
    {
        $this->visionRepository = $visionRepository;
        $this->missionRepository = $missionRepository;
    }

    public function index()
    {
        $visions = $this->visionRepository->get();
        $missions = $this->missionRepository->get();

        return view('admin.visimisi.index', [
            'visions' => $visions,
            'missions' => $missions
        ]);
    }
}

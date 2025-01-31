<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\MissionRepository;
use App\Http\Requests\MissionStoreRequest;
use App\Http\Requests\MissionUpdateRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class MissionController extends Controller implements HasMiddleware
{
    private $missionRepository;

    public function __construct(
        MissionRepository $missionRepository
    )
    {
        $this->missionRepository = $missionRepository;
    }
    
    public function create()
    {
        return view('admin.visimisi.create-mission');
    }

    public static function middleware(): array
    {
        return [
             new Middleware('role:superadmin|admin', only: ['create','destroy']),
        ];
    }

    public function store(MissionStoreRequest $request, Mission $mission)
    {
        $data = $request->only('mission');
      
        try {
            DB::beginTransaction();

            $mission = $mission->fill($data);
            $mission = $this->missionRepository->store($mission);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage
            ]);
        }
        
        return redirect()->route('admin.visimisi.index')->with([
            'success' => 'Mission has successfully created.'
        ]);
    }

    public function edit(Mission $mission)
    {
        return view('admin.visimisi.edit-mission', [
            'mission' => $mission
        ]);
    }

    public function update(MissionUpdateRequest $request, Mission $mission)
    {
        $data = $request->only('mission');
      
        try {
            DB::beginTransaction();

            $mission = $mission->fill($data);
            $mission = $this->missionRepository->store($mission);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage
            ]);
        }
        
        return redirect()->route('admin.visimisi.index')->with([
            'success' => 'Mission has been successfully updated.'
        ]);
    }

    public function destroy(Mission $mission)
    {
        try {
            DB::beginTransaction();

            $mission->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage
            ]);
        }
        
        return redirect()->route('admin.visimisi.index')->with([
            'success' => 'Mission has been successfully deleted.'
        ]);
    }
}

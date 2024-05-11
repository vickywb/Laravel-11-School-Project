<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\VisionRepository;
use App\Http\Requests\VisionStoreRequest;
use App\Http\Requests\VisionUpdateRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VisionController extends Controller implements HasMiddleware
{
    private $visionRepository;
    
    public function __construct(
        VisionRepository $visionRepository
    )
    {
        $this->visionRepository = $visionRepository;
    }

    public static function middleware(): array
    {
        return [
             new Middleware('role:superadmin|admin', only: ['create','destroy']),
        ];
    }

    public function create()
    {
        return view('admin.visimisi.create-vision');
    }

    public function store(VisionStoreRequest $request, Vision $vision)
    {
        $data = $request->only('vision');

        try {
            DB::beginTransaction();

            $vision = new Vision($data);
            $vision = $this->visionRepository->store($vision);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage
            ]);
        }
        
        return redirect()->route('admin.visimisi.index')->with([
            'success' => 'Vision has successfully created.'
        ]);
    }

    public function edit(Vision $vision)
    {
        return view('admin.visimisi.edit-vision', [
            'vision' => $vision
        ]);
    }

    public function update(VisionUpdateRequest $request, Vision $vision)
    {
        $data = $request->only('vision');
      
        try {
            DB::beginTransaction();

            $vision = $vision->fill($data);
            $vision = $this->visionRepository->store($vision);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage
            ]);
        }
        
        return redirect()->route('admin.visimisi.index')->with([
            'success' => 'Vision has been successfully updated.'
        ]);
    }

    public function destroy(Vision $vision)
    {
        try {
            DB::beginTransaction();

            $vision->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage
            ]);
        }
        
        return redirect()->route('admin.visimisi.index')->with([
            'success' => 'Vision has been successfully deleted.'
        ]);
    }
}

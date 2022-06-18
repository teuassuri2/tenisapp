<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLevelRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\LevelJsonResource;
use App\Http\Resources\LevelResource;
use App\Models\Level;
use App\Models\Vendedor;
use App\Services\LevelService;

class LevelController extends Controller {

    private LevelService $levelService;

    public function __construct(LevelService $levelService) {
        $this->levelService = $levelService;
    }

    public function indexApi() {
        //if ($request->isMethod("post")) {
            $level = $this->levelService->findAll();
            return response()->json(new LevelResource($level), 200);
        //}
    }

    public function index() {
        $level = $this->levelService->findAll();
        return view('level.index', ['level' => $level]);
    }

    public function storeApi(StoreLevelRequest $request) {
        if ($request->isMethod("post")) {
            $level = $this->levelService->store($request->validated());
            return response()->json(new LevelJsonResource($level), 200);
        }
    }

    public function editApi(Level $level, StoreLevelRequest $request) {
        if ($request->isMethod("post")) {
            $level = $this->levelService->update($level, $request->validated());
            return response()->json(new LevelJsonResource($level), 200);
        }
    }

    public function store(StoreLevelRequest $request) {
        if ($request->isMethod("post")) {
            $level = $this->levelService->store($request->validated());
        }
        return view('level.add');
    }

    public function edit(Level $level, StoreLevelRequest $request) {
        if ($request->isMethod("post")) {
            $level = $this->levelService->update($level, $request->validated());
        }
        return view('level.edit', ['dados' => $level]);
    }

    public function deleteApi(int $id) {
        if ($request->isMethod("post")) {
            $this->levelService->delete($id);
            return response()->json((true), 200);
        }
    }

    public function delete(int $id) {
        $this->levelService->delete($id);
        return redirect('/index');
    }

}

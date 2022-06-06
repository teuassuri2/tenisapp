<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\GroupJsonResource;
use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\Vendedor;
use App\Services\GroupService;

class GroupController extends Controller {

    private GroupService $groupService;

    public function __construct(GroupService $groupService) {
        $this->groupService = $groupService;
    }

    public function indexApi(Request $request) {
        if ($request->isMethod("post")) {
            $group = $this->groupService->findAll();
            return response()->json(new GroupResource($group), 200);
        }
    }

    public function index() {
        $group = $this->groupService->findAll();
        return view('group.index', ['group' => $group]);
    }

    public function storeApi(StoreGroupRequest $request) {
        if ($request->isMethod("post")) {
            $group = $this->groupService->store($request->validated());
            return response()->json(new GroupJsonResource($group), 200);
        }
    }

    public function editApi(Group $group, StoreGroupRequest $request) {
        if ($request->isMethod("post")) {
            $group = $this->groupService->update($group, $request->validated());
            return response()->json(new GroupJsonResource($group), 200);
        }
    }

    public function store(StoreGroupRequest $request) {
        if ($request->isMethod("post")) {
            $group = $this->groupService->store($request->validated());
        }
        return view('group.add');
    }

    public function edit(Group $group, StoreGroupRequest $request) {
        if ($request->isMethod("post")) {
            $group = $this->groupService->update($group, $request->validated());
        }
        return view('group.edit', ['dados' => $group]);
    }

    public function deleteApi(int $id) {
        if ($request->isMethod("post")) {
            $this->groupService->delete($id);
            return response()->json((true), 200);
        }
    }

    public function delete(int $id) {
        $this->groupService->delete($id);
        return redirect('/index');
    }

}

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

    public function indexApi($client_id) {
            $group = $this->groupService->findAllByClient($client_id);
            return response()->json(new GroupResource($group), 200);
    }

    public function index() {
        $group = $this->groupService->findAll();
        return view('group.index', ['group' => $group]);
    }

    public function storeApi(Request $request) {
        //if ($request->isMethod("post")) {
            $group = $this->groupService->store($request->all());
            return response()->json($group, 200);
       // }
    }

    public function editApi($id, Request $request) {
        #if ($request->isMethod("post")) {
            $group = $this->groupService->update($id, $request->all());
            return response()->json($group, 200);
        #}
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

    public function removerApi(int $id) {
            $this->groupService->delete($id);
            return response()->json((true), 200);
    }

    public function delete(int $id) {
        $this->groupService->delete($id);
        return redirect('/index');
    }

}

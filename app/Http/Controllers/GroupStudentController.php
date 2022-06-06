<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupStudentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\GroupStudentJsonResource;
use App\Http\Resources\GroupStudentResource;
use App\Models\GroupStudent;
use App\Models\Vendedor;
use App\Services\GroupStudentService;

class GroupStudentController extends Controller {

    private GroupStudentService $groupStudentService;

    public function __construct(GroupStudentService $groupStudentService) {
        $this->groupStudentService = $groupStudentService;
    }

    public function indexApi(Request $request) {
        if ($request->isMethod("post")) {
            $groupStudent = $this->groupStudentService->findAll();
            return response()->json(new GroupStudentResource($groupStudent), 200);
        }
    }

    public function index() {
        $groupStudent = $this->groupStudentService->findAll();
        return view('group_student.index', ['group_student' => $groupStudent]);
    }

    public function storeApi(StoreGroupStudentRequest $request) {
        if ($request->isMethod("post")) {
            $groupStudent = $this->groupStudentService->store($request->validated());
            return response()->json(new GroupStudentJsonResource($groupStudent), 200);
        }
    }

    public function editApi(GroupStudent $groupStudent, StoreGroupStudentRequest $request) {
        if ($request->isMethod("post")) {
            $groupStudent = $this->groupStudentService->update($groupStudent, $request->validated());
            return response()->json(new GroupStudentJsonResource($groupStudent), 200);
        }
    }

    public function store(StoreGroupStudentRequest $request) {
        if ($request->isMethod("post")) {
            $groupStudent = $this->groupStudentService->store($request->validated());
        }
        return view('group_student.add');
    }

    public function edit(GroupStudent $groupStudent, StoreGroupStudentRequest $request) {
        if ($request->isMethod("post")) {
            $groupStudent = $this->groupStudentService->update($groupStudent, $request->validated());
        }
        return view('group_student.edit', ['dados' => $groupStudent]);
    }

    public function deleteApi(int $id) {
        if ($request->isMethod("post")) {
            $this->groupStudentService->delete($id);
            return response()->json((true), 200);
        }
    }

    public function delete(int $id) {
        $this->groupStudentService->delete($id);
        return redirect('/index');
    }

}

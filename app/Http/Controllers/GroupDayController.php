<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupDayRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\GroupDayJsonResource;
use App\Http\Resources\GroupDayResource;use App\Models\GroupDay;
use App\Models\Vendedor; 
use App\Services\GroupDayService;
class GroupDayController extends Controller { 
private GroupDayService $groupDayService; 
public function __construct(GroupDayService $groupDayService) {$this->groupDayService = $groupDayService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$groupDay = $this->groupDayService->findAll();
return response()->json(new GroupDayResource($groupDay), 200);
}
}
public function index() {
$groupDay = $this->groupDayService->findAll();
return view('group_day.index', ['group_day' => $groupDay ]);}
public function storeApi(StoreGroupDayRequest $request) {if ($request->isMethod("post")) {$groupDay = $this->groupDayService->store($request->validated());return response()->json(new GroupDayJsonResource($groupDay), 200);}
}
public function editApi(GroupDay$groupDay ,StoreGroupDayRequest $request) {if ($request->isMethod("post")) {$groupDay = $this->groupDayService->update($groupDay,$request->validated());return response()->json(new GroupDayJsonResource($groupDay), 200);}
}
public function store(StoreGroupDayRequest $request) {if ($request->isMethod("post")) {$groupDay = $this->groupDayService->store($request->validated());}
return view('group_day.add');}
public function edit(GroupDay$groupDay ,StoreGroupDayRequest $request) {if ($request->isMethod("post")) {$groupDay = $this->groupDayService->update($groupDay,$request->validated());}
return view('group_day.edit', ['dados' => $groupDay ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->groupDayService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->groupDayService->delete($id);
return redirect('/index');
}
}

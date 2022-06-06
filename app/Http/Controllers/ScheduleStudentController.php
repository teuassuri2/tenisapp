<?php
            namespace App\Http\Controllers;

use App\Http\Requests\StoreScheduleStudentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest; 
use App\Http\Resources\ScheduleStudentJsonResource;
use App\Http\Resources\ScheduleStudentResource;use App\Models\ScheduleStudent;
use App\Models\Vendedor; 
use App\Services\ScheduleStudentService;
class ScheduleStudentController extends Controller { 
private ScheduleStudentService $scheduleStudentService; 
public function __construct(ScheduleStudentService $scheduleStudentService) {$this->scheduleStudentService = $scheduleStudentService; 
}
public function indexApi(Request $request) {
if ($request->isMethod("post")) {$scheduleStudent = $this->scheduleStudentService->findAll();
return response()->json(new ScheduleStudentResource($scheduleStudent), 200);
}
}
public function index() {
$scheduleStudent = $this->scheduleStudentService->findAll();
return view('schedule_student.index', ['schedule_student' => $scheduleStudent ]);}
public function storeApi(StoreScheduleStudentRequest $request) {if ($request->isMethod("post")) {$scheduleStudent = $this->scheduleStudentService->store($request->validated());return response()->json(new ScheduleStudentJsonResource($scheduleStudent), 200);}
}
public function editApi(ScheduleStudent$scheduleStudent ,StoreScheduleStudentRequest $request) {if ($request->isMethod("post")) {$scheduleStudent = $this->scheduleStudentService->update($scheduleStudent,$request->validated());return response()->json(new ScheduleStudentJsonResource($scheduleStudent), 200);}
}
public function store(StoreScheduleStudentRequest $request) {if ($request->isMethod("post")) {$scheduleStudent = $this->scheduleStudentService->store($request->validated());}
return view('schedule_student.add');}
public function edit(ScheduleStudent$scheduleStudent ,StoreScheduleStudentRequest $request) {if ($request->isMethod("post")) {$scheduleStudent = $this->scheduleStudentService->update($scheduleStudent,$request->validated());}
return view('schedule_student.edit', ['dados' => $scheduleStudent ]);}
public function deleteApi(int $id) {if ($request->isMethod("post")) {$this->scheduleStudentService->delete($id);
return response()->json((true), 200);
}
}
public function delete(int $id) {$this->scheduleStudentService->delete($id);
return redirect('/index');
}
}

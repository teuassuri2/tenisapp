<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateVendedorRequest;
use App\Http\Resources\StudentJsonResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\Vendedor;
use App\Services\StudentService;

class StudentController extends Controller {

    private StudentService $studentService;

    public function __construct(StudentService $studentService) {
        $this->studentService = $studentService;
    }

    public function indexApi(Request $request) {
        $student = $this->studentService->findAllAndGroups();
        return response()->json(new StudentResource($student), 200);
    }

    public function studentByGroup($group_id) {
        $student = $this->studentService->studentByGroup($group_id);
        return response()->json(new StudentResource($student), 200);
    }

    public function index() {
        $student = $this->studentService->findAll();
        return view('student.index', ['student' => $student]);
    }

    public function storeApi(StoreStudentRequest $request) {
        if ($request->isMethod("post")) {
            $student = $this->studentService->store($request->validated());
            return response()->json(new StudentJsonResource($student), 200);
        }
    }

    public function editApi(Int $id, Request $request) {
        
        if ($request->isMethod("post")) {
            $student = $this->studentService->update($id, $request->all());
            return response()->json($student, 200);
       }
    }

    public function store(StoreStudentRequest $request) {
        if ($request->isMethod("post")) {
            $student = $this->studentService->store($request->validated());
        }
        return view('student.add');
    }

    public function edit(Student $student, StoreStudentRequest $request) {
        if ($request->isMethod("post")) {
            $student = $this->studentService->update($student, $request->validated());
        }
        return view('student.edit', ['dados' => $student]);
    }

    public function deleteApi(int $id) {
            $this->studentService->delete($id);
            return response()->json((true), 200);
    }

    public function delete(int $id) {
        $this->studentService->delete($id);
        return redirect('/index');
    }

}

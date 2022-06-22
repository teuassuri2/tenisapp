<?php

namespace App\Services;

use App\Models\Student;

class StudentService {

    private Student $student;
    private GroupStudentService $groupStudentService;

    public function __construct(Student $student, GroupStudentService $groupStudentService) {
        $this->student = $student;
        $this->groupStudentService = $groupStudentService;
    }

    public function store(array $data) {

        $this->student->name = $data['name'];
        $this->student->email = $data['email'];
        $this->student->phone = $data['phone'];
        $this->student->client_id = $data['client_id'];
        $this->student->level_id = $data['level_id'];
        $this->student->save();
        return $this->student;
    }

    public function update(Int $id, array $data) {

        $student = $this->findOne($id);
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->gender = $data['gender'];

        if (!empty($data['level_id']))
            $student->level_id = $data['level_id'];

        $student->save();
        return $student;
    }

    public function findAll() {
        return $this->student->all();
    }

    public function findAllAndGroups(int $client_id) {
        $student = $this->student->where('client_id', $client_id)->get();

        foreach ($student as $key => $data) {
            $student[$key]->level = $data->Level()->get()[0]->name;
            $student[$key]->groups = $this->groupStudentService->getGruposByStudent($data->id);
        }

        return $student;
    }

    public function studentByGroup($group_id) {
        return $this->student->studentByGroup($group_id);
    }

    public function findOne(int $id) {
        return $this->student->find($id);
    }

    public function delete(int $id) {

        $data = $this->student->find($id);
        if (!empty($data)) {
            return $data->delete();
        } else {
            return false;
        }
    }

}

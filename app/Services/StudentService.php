<?php

namespace App\Services;

use App\Models\Student;

class StudentService {

    private Student $student;

    public function __construct(Student $student) {
        $this->student = $student;
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

    public function update(Student $student, array $data) {
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->client_id = $data['client_id'];
        $student->level_id = $data['level_id'];
        $student->save();
        return $student;
    }

    public function findAll() {
        return $this->student->all();
    }

    public function findOne(int $id) {
        return $this->student->find($id);
    }

    public function delete(int $id) {
        return $this->student->find($id)->delete();
    }

}

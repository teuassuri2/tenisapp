<?php

namespace App\Services;

use App\Models\GroupStudent;

class GroupStudentService {

    private GroupStudent $groupStudent;

    public function __construct(GroupStudent $groupStudent) {
        $this->groupStudent = $groupStudent;
    }

    public function store(array $data) {
        $this->groupStudent->group_id = $data['group_id'];
        $this->groupStudent->student_id = $data['student_id'];
        $this->groupStudent->save();
        return $this->groupStudent;
    }

    public function update(GroupStudent $groupStudent, array $data) {
        $groupStudent->group_id = $data['group_id'];
        $groupStudent->student_id = $data['student_id'];
        $groupStudent->save();
        return $groupStudent;
    }

    public function findAll() {
        return $this->groupStudent->all();
    }
    
    public function getGruposByStudent($student_id) {
        return $this->groupStudent->select('group.*')
                ->join('group', 'group.id', '=', 'group_student.group_id')
                ->where('group_student.student_id', $student_id)
                ->get();
    }
    

    public function findOne(int $id) {
        return $this->groupStudent->find($id);
    }

    public function delete(int $id) {
        return $this->groupStudent->find($id)->delete();
    }

}

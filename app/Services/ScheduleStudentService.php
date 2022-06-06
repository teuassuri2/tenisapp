<?php  namespace App\Services; use App\Models\ScheduleStudent; class ScheduleStudentService {  private ScheduleStudent $scheduleStudent;public function __construct(ScheduleStudent $scheduleStudent)
    {
        $this->scheduleStudent = $scheduleStudent;
    }public function store(array $data){ $this->scheduleStudent->date = $data['date'];
 $this->scheduleStudent->presence_absence = $data['presence_absence'];
 $this->scheduleStudent->status = $data['status'];
 $this->scheduleStudent->user_id = $data['user_id'];
 $this->scheduleStudent->group_student_id = $data['group_student_id'];
 $this->scheduleStudent->schedule_student_id = $data['schedule_student_id'];
 $this->scheduleStudent->save();
 return $this->scheduleStudent;
}public function update(ScheduleStudent $scheduleStudent, array $data){ $scheduleStudent->date = $data['date'];
 $scheduleStudent->presence_absence = $data['presence_absence'];
 $scheduleStudent->status = $data['status'];
 $scheduleStudent->user_id = $data['user_id'];
 $scheduleStudent->group_student_id = $data['group_student_id'];
 $scheduleStudent->schedule_student_id = $data['schedule_student_id'];
 $scheduleStudent->save();
return $scheduleStudent;
}public function findAll()
    {
        return $this->scheduleStudent->all();
    }public function findOne(int $id)
    {
        return $this->scheduleStudent->find($id);
    }public function delete(int $id)
    {
        return $this->scheduleStudent->find($id)->delete();
    }  }
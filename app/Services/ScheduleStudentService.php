<?php

namespace App\Services;

use App\Models\ScheduleStudent;
use Illuminate\Support\Facades\Http;

class ScheduleStudentService {

    private ScheduleStudent $scheduleStudent;

    public function __construct(ScheduleStudent $scheduleStudent) {
        $this->scheduleStudent = $scheduleStudent;
    }

    public function store(array $data) {
        $this->scheduleStudent->date = $data['date'];
        $this->scheduleStudent->presence_absence = $data['presence_absence'];
        $this->scheduleStudent->status = $data['status'];
        $this->scheduleStudent->user_id = $data['user_id'];
        $this->scheduleStudent->group_student_id = $data['group_student_id'];
        $this->scheduleStudent->schedule_student_id = $data['schedule_student_id'];
        $this->scheduleStudent->save();
        return $this->scheduleStudent;
    }

    public function update(ScheduleStudent $scheduleStudent, array $data) {
        $scheduleStudent->date = $data['date'];
        $scheduleStudent->presence_absence = $data['presence_absence'];
        $scheduleStudent->status = $data['status'];
        $scheduleStudent->user_id = $data['user_id'];
        $scheduleStudent->group_student_id = $data['group_student_id'];
        $scheduleStudent->schedule_student_id = $data['schedule_student_id'];
        $scheduleStudent->save();
        return $scheduleStudent;
    }

    public function findAll() {
        return $this->scheduleStudent->all();
    }

    public function findOne(int $id) {
        return $this->scheduleStudent->find($id);
    }

    public function delete(int $id) {
        return $this->scheduleStudent->find($id)->delete();
    }
    
    public function nextClass() {
        
        $response = Http::get('http://api.hgbrasil.com/weather?woeid=455826');
        if (!empty($response->collect()['results']['forecast'])) {
            $forecast = [];
            foreach ($response->collect()['results']['forecast'] as $data) {
                $forecast[$data['date']] = $data;
            }
        }
        $scheduleStudent = $this->scheduleStudent->where('id', '<=', 2)->get();
        
        
        foreach ($scheduleStudent as $key => $data) {
            $scheduleStudent[$key]->group_student = $data->groupStudent->toArray();
            $scheduleStudent[$key]->forecast = $forecast[$data->date->format('d/m')];
        }
        return $scheduleStudent;
    }
    
    
    public function classToday() {
        
        return $this->scheduleStudent
                ->select('student.*', 'schedule_student.date')
                ->join('group_student', 'group_student.id', '=', 'schedule_student.group_student_id')
                ->join('student', 'student.id', '=', 'group_student.student_id')
                ->where('schedule_student.date', date('Y-m-d'))
                ->get();
    }
    
    
    public function classWeek() {
        
        return $this->scheduleStudent
                ->select('student.*', 'schedule_student.date')
                ->join('group_student', 'group_student.id', '=', 'schedule_student.group_student_id')
                ->join('student', 'student.id', '=', 'group_student.student_id')
                ->where('schedule_student.date', '>=' ,date('Y-m-d'))
                ->where('schedule_student.date', '<=' , date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 days')))
                ->get();
    }
    
    

}

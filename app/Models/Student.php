<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = "student";
    protected $fillable = ['name', 'email', 'phone',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function Groups() {
        return $this->hasMany(GroupStudent::class, 'student_id', 'id');
    }

    public function Level() {
        return $this->hasOne(Level::class, 'id', 'level_id');
    }

    public function studentByGroup($group_id) {
        return $this->select('student.*')
                        ->join('group_student', 'group_student.student_id', '=', 'student.id')
                        ->where('group_student.group_id', $group_id)->get();
    }

}

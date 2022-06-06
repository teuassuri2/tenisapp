<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleStudent extends Model {

    protected $table = "schedule_student";
    protected $fillable = ['date', 'presence_absence', 'status', 'user_id', 'group_student_id', 'schedule_student_id',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

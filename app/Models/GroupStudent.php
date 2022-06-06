<?php namespace App\Models;use Illuminate\Database\Eloquent\Factories\HasFactory;use Illuminate\Database\Eloquent\Model;class GroupStudent  extends Model{
    
            protected $table = "group_student";


        protected $fillable = ['group_id', 'student_id', ];protected $dates = [
'created_at',
 'updated_at',
];
}
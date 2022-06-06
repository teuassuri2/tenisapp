<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = "student";
    protected $fillable = ['name', 'email', 'phone', 'client_id', 'level_id',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

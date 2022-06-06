<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

    protected $table = "group";
    protected $fillable = [];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $table = "client";
    protected $fillable = ['name', 'telefone', 'email',];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}

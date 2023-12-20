<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model
{ 
    protected $table = 'department_heads';
    
    protected $fillable = [
        'username',
        'name',
        'rights',
        'module',
        'date_added',
    ];

    protected $dates = [
        'date_added',
    ];
}
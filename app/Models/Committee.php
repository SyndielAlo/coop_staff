<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{  
    protected $table = 'bod_committee';
    protected $fillable = [
        'name',
        'committee',
        'position',
        'period',
        'photo',
        'status',
    ];
}

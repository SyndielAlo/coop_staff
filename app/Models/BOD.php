<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOD extends Model
{
    use HasFactory;

    protected $table = 'board_of_directors';

    protected $fillable = ['id','name', 'position', 'period', 'photo', 'status'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resolution extends Model
{
    
    protected $fillable = [
        'id',
        'res_number',
        'agenda',
        'res_date',
        'status',
        'encoded_by',
        'encodedByDate',
        'created_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $fillable = ['user_id', 'name', 'ip_address', 'mac_address', 'login_time'];

    // Define indexes
    protected $indexes = ['user_id', 'login_time'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'login_time' => 'datetime', // Assuming login_time is a timestamp
    ];
}

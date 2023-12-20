<?php

namespace App\Http\Controllers\logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class welcome_controller extends Controller
{
    public function landing(){
        return view('welcome');
    }
}

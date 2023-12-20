<?php

namespace App\Http\Controllers\logs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DH_login_controller extends Controller
{
    public function dhLogin(){
        return view('auth.DH_login');
    }
}

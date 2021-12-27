<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;


class LoginController extends Controller
{
       public function adminlogin()
    {
        return view('admin/login');
    } 
     public function logout()
    {

    	 auth()->logout();
    	 Session::forget('role');
        return redirect('admin/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mail;


class UserDashboardController extends Controller
{
    public function userDashboard()
    {
        $currentid = Auth::id(); 
        $getUser = User::where('id',$currentid)->get();
    	return view('Frontend/userDashboard', compact('getUser'));
    }

    public function Commonheader()
    {
      $currentid = Auth::id(); 
      $getUser = User::where('id',$currentid)->get();
      return view('partialFrontend/header', compact('getUser'));  
    }

      public function logout()
    {
        auth()->logout();
    	Session::forget('role');
        return redirect('login');
    }



}

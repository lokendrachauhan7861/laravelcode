<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Mail;



class UserDashboardController extends Controller
{
   

    public function __construct()
    {
        
      $this->middleware(function ($request, $next) {
       $authData = Auth::user();
        $authDataArr = ['name'=>$authData->name,'pic'=>$authData->pic];
        Session::put('authSessData', $authDataArr);

        return $next($request);
    });
    }

    public function getUserData()
    {
      $getdata = $currentid = Auth::id(); 
    }

    public function userDashboard()
    {

        $currentid = Auth::id(); 
        $getUser = User::where('id',$currentid)->get();
    	return view('Frontend/userDashboard', compact('getUser'));
    }


      public function logout()
    {
        auth()->logout();
    	Session::forget('role');
        return redirect('login');
    }



}

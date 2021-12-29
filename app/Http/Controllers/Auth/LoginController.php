<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Session;

use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
   

     protected function authenticated()
    {
        if( Auth::user()->status == 0) {
              
              Auth::logout();
              Auth::guard('web')->logout();
              Session::flush();

            return redirect('/login')->with('success', 'Sorry ! Your Account is InActive. Please Verify Your Email ID.');
         }
           else {
        
                    $role = Auth::user()->role;
                    switch($role) {
                     case '1':
                     return redirect('/admin/dashboard');
                    break;
                     case '2':
                     return redirect('/user/dashboard');
                    break;
                     default:
                     return redirect('/login');
                    break;
                      }
             }
    }

 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

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
    public function redirectTo() { 

  $checkui = session()->get('validlgoinui');

  $tablerole = session()->get('tablerole');

  if($checkui != $tablerole || $tablerole == '0')

  {

    if($checkui == '1')

    {

      Auth::logout();

      Auth::guard('web')->logout();

      Session::flush();

      Session::forget('role');

      return ('/admin/login/UnAuthorized'); 
    

    }

    else

    {

      Auth::logout();

      Auth::guard('web')->logout();

      Session::flush();

      Session::forget('role');

      return ('/login?='.'UnAuthorized');



      

    }

  }

  else

  {

    $role = Auth::user()->role; 

     switch ($role) {

    case '1':

       return 'admin/dashboard';

      break;

    case '2':

      return 'seller/dashboard';

      break;

     

    default:

      return '/home'; 

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

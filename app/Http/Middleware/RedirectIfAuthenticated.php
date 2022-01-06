<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

  
    public function handle(Request $request, Closure $next, ...$guards)
    {
         if (Auth::guard($guards)->check()) {

    $checkroledata = $request->input('email');

    // echo $checkroledata;die;

    $role = Auth::user()->role; 

      

     switch ($role) {

        case '1':

         return redirect('admin/dashboard');

         break;

         case '2':

         return redirect('user/dashboard');

         break;


      default:

         return redirect('login'); 

         break;

    }

  }

  return $next($request);


    }
}

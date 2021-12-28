<?php

namespace App\Gates;
use Illuminate\Auth\Access\Response;
use App\Models\User;
use App\Models\Permission;

class PostGate {
    
    public function allowed($user, $allowed)
    {

        //$allproducts = Permission::with('getuserpermission')->get();
        //$allproducts = Permission::with('getuserpermission')->where('permission_role_id', $user->role_user_id)->get();
       //dd($allproducts);
       //echo "<pre>";
        $c = User::leftJoin('permissions', function($join) {
      $join->on('users.role', '=', 'permissions.permission_role_id');
    })
    ->where('permissions.permission_role_id', $user->role)->first();
        //echo "<pre>";
       // print_r($c);die;
        $menu_permission = $c['menu_permission'];
        if(!empty($menu_permission))
        {
         $brealrole = explode(",",$menu_permission);   
        }
        else
        {
        $brealrole = ['dummyrole'];
        }
      

        //$checkmenupermission = (!empty($brealrole)) ? $brealrole : '';
      // dd($checkmenupermission);
         //$dbarr = array('roleManagement','websiteManagement','productManagement','packageManagement');
            return array_intersect($allowed->all(),$brealrole);

    }

    public function allowedAction($user, $allowedaction) {
        //dd($allowedaction);
         $c = User::leftJoin('permissions', function($join) {
      $join->on('users.role', '=', 'permissions.permission_role_id');
    })
    ->where('permissions.permission_role_id', $user->role)->first();
        //echo "<pre>";
       // print_r($c);die;
        $menu_permission = $c['menu_permission'];
        if(!empty($menu_permission))
        {
         $brealrole = explode(",",$menu_permission);   
        }
        else
        {
        $brealrole = ['dummyrole'];
        }
         //$dbarr = array('websiteManagement','productManagement','packageManagement','testimonial');
           return (array_intersect($allowedaction->all(),$brealrole)) ? Response::allow() : Response::deny("You Are Not Authorized");
    }
}

?>
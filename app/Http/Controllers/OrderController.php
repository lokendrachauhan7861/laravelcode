<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    
      public function order()
      {
         //DB::enableQueryLog();
         $orderData = DB::table('orders')
          ->join('users', 'users.id', '=', 'orders.user_id')
          ->join('products', 'products.id', '=', 'orders.product_id')
          ->select('users.name as username','users.email','products.name as productname', 'products.price')
         ->paginate(2);
       
         //dd(DB::getQueryLog());
         return view('Frontend/order',compact('orderData'));
      }
     
      public function getThirdPartyAPiINController()
      {
         $client = new Client();
          $res = $client->request('GET', 'https://r3w7y7m2g0.execute-api.us-east-2.amazonaws.com/test/junomeal/cardtransactions?key=0C98F0AECE28B5CD4DA219AE53CFE7C4DB3230DE0020179151EDA1E0B7A3AB3F');
          $apiData = json_decode($res->getBody()->getContents());
          echo "<pre>";
          print_r($apiData);die;
      }
}

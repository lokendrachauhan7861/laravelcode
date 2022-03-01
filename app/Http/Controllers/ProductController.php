<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(Request $request)
    {
       

        $products = Product::paginate(1);
        


        return view('Frontend/products', compact('products'));
    }


    public function product_ajax_filter(Request $request)
    {
     
      $brand = $request->input('brand');
      $data = $this->get_product_ajax_data($brand);
      $output = array('allData'=>$data);
      echo json_encode($output);

    }

    public function get_product_ajax_data($brand)
    {
       $filterProducts = Product::whereIn('name', $brand ?? [])->paginate(1);
     
       $rowCount = $filterProducts->count();
       $output = '';
       if($rowCount >= 1)
       {

        foreach($filterProducts as $product)
        {  
         $output .= '<div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src="'.$product->image.'" alt="" class="w-full max-h-60" style="width:100px;height:100px;">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">'.$product->name.'</h3>
                    <span class="mt-2 text-gray-500">$ '.$product->price.'</span>
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <input type="hidden" value="4" name="id">
                        <input type="hidden" value="err" name="name">
                        <input type="hidden" value="wrwer" name="price">
                        <input type="hidden" value="rerwr"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                    </form>
                </div>
                
            </div>
          <div class="d-felx justify-content-center">'.$filterProducts->links().' </div>';
          }
        }
       
       else
       {
        $output = '<h3>Product Not Found.</h3>';
       }
   
       return $output;
    }
} 
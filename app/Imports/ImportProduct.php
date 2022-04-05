<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\ProductCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use DB;
use File;
use Storage;
use Session;

class ImportProduct implements ToCollection, WithHeadingRow
{




     public function collection(Collection $rows)
    {
     
      
      Validator::make($rows->toArray(), [
             '*.brand_name' => 'required',
             '*.cat_name' => 'required',
             '*.name' => 'required',
             '*.price' => 'required',
             '*.description' => 'required',
             '*.image' => 'required',
         ])->validate();

      if(count($rows) > 0)
      {
    
      $getCategoryExitsOrNot = $this->categoryExistOrNot($rows);
      }

      else
      {
       Session::put('csvCheckEmptyOrNot', 'csv');
      }
     

    }

    public function categoryExistOrNot($rows)
    {

          $storeData = '';
          foreach($rows as $value) {
          $brandName =  $value['brand_name'];
          $catName =  $value['cat_name'];
          $getCategoryQuery = ProductCategory::where('brand_name', $brandName)->where('cat_name', $catName)->first();
          
          if(!empty($getCategoryQuery))
           {

            $productCategoryID =  $getCategoryQuery['id'];

           } else
           {
             $createCategory = ProductCategory::create([
            'brand_name' => $value['brand_name'],
            'cat_name' => $value['cat_name'],
             ]);
             
             $productCategoryID = $createCategory->id;

             $filePath = '../public/textFile/mytextdocument.txt';
             $storeData .= $value['brand_name'].'|'.$value['cat_name']."\n"; // put data in new line /n

             File::put($filePath,$storeData );
            
           }
          
           $p_name = $value['name'];
           $p_price = $value['price'];
           $p_description = $value['description'];
           $p_image = $value['image'];

           $this->insertProduct($productCategoryID, $p_name, $p_price, $p_description, $p_image);



          }
    }

    public function insertProduct($productCategoryID, $p_name, $p_price, $p_description, $p_image)
    {        
             //DB::enableQueryLog(); 
             Product::create([
            'cat_id' => $productCategoryID,
            'name' => $p_name,
            'price' => $p_price,
            'description' => $p_description,
            'image' => $p_image,
             ]);
             //dd(DB::getQueryLog());  
    }


}
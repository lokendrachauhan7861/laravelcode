<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Session;
use Redirect;

class ImportProductController extends Controller
{


    public function productImport()
    {
       return view('admin/product/productImport');
    }

    public function importProduct(Request $request)
    {

    
     $checkfileEmptyOrNot = Excel::import(new ImportProduct, $request->file('file')->store('files'));
     $getSetSessionCsv = Session::get('csvCheckEmptyOrNot');
     if($getSetSessionCsv == 'csv')
     {
      Session::forget('csvCheckEmptyOrNot');
      return Redirect::back()->with('emptyfile', 'Data Not Found In CSV.');
     } else
     {
     return Redirect::back()->with('success', 'Data Imported Successfully.');
     }
    }
}

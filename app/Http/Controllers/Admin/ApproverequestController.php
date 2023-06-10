<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\admin\Variation;
use App\Models\admin\Variationoption;
use App\Models\admin\Product;

class ApproverequestController extends Controller
{
    function approve()
    {
          $brand= Brand::where('status','pending')->orwhere('updatestatus','pending')
          ->join('users','brands.addedby', '=', 'users.id')
          ->get();
          $category= Category::where('status','pending')->orwhere('updatestatus','pending')
          ->join('users','categories.addedby', '=', 'users.id')
          ->get();
          $variation= Variation::where('status','pending')->orwhere('updatestatus','pending')
          ->join('users','variations.addedby', '=', 'users.id')
          ->get();
          $variationoption= Variationoption::where('status','pending')->orwhere('updatestatus','pending')
          ->join('users','variationoptions.addedby', '=', 'users.id')
          ->get();
          $product= Product::where('products.status','pending')->orwhere('products.updatestatus','pending')
          ->join('users','products.addedby', '=', 'users.id')
          ->join('brands','products.brand','=','brands_id')
          ->select('products.product_id','products.product_name','products.discription','products.addedby','products.lowstockindication','products.thumbnail','brands.brand_name')
          ->get();
          return view('admin.approverequest')->with(compact('brand','category','variation','variationoption','product'));

    }

}

<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
Use App\Models\Admin\Product;
Use App\Models\Admin\Productcategory;
use App\Models\Admin\Brand;

class ProductviewController extends Controller
{
   public function index(){
    $featured = Product::join('brands','brand','brands_id')
     ->where('featured','=','featured')
    ->get();
    $data = Product::join('brands','brand','brands_id')
    ->where('featured','=','unfeatured')
    ->get();
    return view('product')->with(compact('data','featured'));
   }

   public function viewdetails($id){
    $data = Product::join('brands','brand','brands_id')
    ->join('users','products.addedby','users.id')
    ->where('product_id','=',$id)
    ->get();
    $cato = ProductCategory::where('product_id', $id)->pluck('category_id');
    $productIds = ProductCategory::whereIn('category_id', $cato)->pluck('product_id');
    $getProductDetail = Product::join('brands','brand','brands_id')->whereIn('product_id',$productIds)->get();

    return view('productdetails')->with(compact('data','getProductDetail'));
   }
   public function search(Request $request){
      $search = $request->input('search');
      $data  = Product::join('brands','brand','brands_id')->where('product_name','LIKE',"%$search")->get();
      
      return view('searchItem')->with(compact('data'));
   }

   public function categorySearch($id){
      $dataname = Productcategory::where('category_id' ,$id)->pluck('product_id');
      $data = Product::whereIn('product_id', $dataname)->get();
      return view('searchItem')->with(compact('data'));      
   }
   public function fetchbyBrand($id){
      $data = Product::where('brand',$id)->get();
      return view('searchItem')->with(compact('data'));     
   }
}

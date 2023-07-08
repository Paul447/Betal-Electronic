<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Productcategory;
use App\Models\Admin\Productvariation;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Brand;

class ProductviewController extends Controller
{
    public function index()
    {
        $featured = Product::join('brands', 'brand', 'brands_id')
            ->where('featured', '=', 'featured')
            ->get();
        $data = Product::join('brands', 'brand', 'brands_id')
            ->where('featured', '=', 'unfeatured')
            ->get();
        return view('product')->with(compact('data', 'featured'));
    }

    public function viewdetails($id)
    {
        $data = Product::join('brands', 'brand', 'brands_id')
            ->join('users', 'products.addedby', 'users.id')
            ->where('product_id', '=', $id)
            ->get();
        $cato = ProductCategory::where('product_id', $id)->pluck('category_id');
        $productIds = ProductCategory::whereIn('category_id', $cato)->pluck('product_id');
        $getProductDetail = Product::join('brands', 'brand', 'brands_id')
            ->whereIn('product_id', $productIds)
            ->whereNotIn('product_id', [$id])
            ->get();
        $variations = [];
        $productData = DB::table('productvariations')
            ->where('product', $id)
            ->join('products', 'products.product_id', '=', 'productvariations.product')
            ->join('variations', 'variations.variation_id', '=', 'productvariations.variation_id')
            ->join('variationoptions', 'variationoptions.variationoption_id', '=', 'productvariations.variationoption_id')
            ->select('products.product_name as product_name', 'variations.variation_name as variation_name', 'variationoptions.value as option_name')
            ->groupBy('variation_name', 'product_name', 'option_name')
            ->get();

        return view('productdetails')->with(compact('data', 'getProductDetail', 'productData'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $data = Product::join('brands', 'brand', 'brands_id')
            ->where('product_name', 'LIKE', "%$search")
            ->get();
        $mydata = 'Searched Result';
        return view('searchItem')->with(compact('data', 'mydata'));
    }

    public function categorySearch($id)
    {
        $dataname = Productcategory::where('category_id', $id)->pluck('product_id');
        $data = Product::whereIn('product_id', $dataname)->get();
        $mydata = Category::where('categorys_id', $id)->value('category_name');
        // echo $mydata;
        return view('searchItem')->with(compact('data', 'mydata'));
    }
    public function fetchbyBrand($id)
    {
        $data = Product::where('brand', $id)->get();
        $mydata = Brand::where('brands_id', $id)->value('brand_name');
        return view('searchItem')->with(compact('data', 'mydata'));
    }
    public function newarrivals()
    {
        $mydata = 'New Arrivals';
        $data = Product::latest()
            ->limit(10)
            ->get();
        return view('searchItem')->with(compact('data', 'mydata'));
    }
}

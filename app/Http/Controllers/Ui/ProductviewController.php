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
            ->where([['products.featured', '=', 'featured'], ['products.is_disabled', '=', 0]])
            ->get();

        $data = Product::join('brands', 'brand', 'brands_id')
            ->where([['products.featured', '=', ' unfeatured'], ['products.is_disabled', '=', 0]])
            ->get();
        $metadescription = 'Power up your world with Betal International - Your one-stop computer shop!';
        $metakeyword = 'Laptop accessories Kathmandu,Gaming accessories Nepal,Computer peripherals Kathmandu,Printers and scanners Nepal,Best deals on computer accessories Kathmandu,Keyboard and mouse Kathmandu';
        $metatitle = 'Best Computer Store - Buy Laptops, PC Components in Nepal';
        $ogimage = "/admin/img/logo.png";
        $ogtitle = "Best Computer Store - Buy Laptops, PC Components in Nepal";
        return view('product')->with(compact('data', 'featured', 'metadescription','metakeyword','metatitle','ogimage','ogtitle'));
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
            ->where('is_disabled', 0)
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
        $metadescriptiondetail = Product::where('product_id', $id)->pluck('meta_desc')->first();
        $metaprokeyword = Product::where('product_id', $id)->pluck('lowstockindication')->first();
        $metaproductimage = Product::where('product_id', $id)->pluck('thumbnail')->first();
        $thumb = "/storage/thumbnails/$metaproductimage";
        $ogproducttitle = Product::where('product_id', $id)->pluck('product_name')->first();

        return view('productdetails')->with(compact('data', 'getProductDetail', 'productData', 'metadescriptiondetail','metaprokeyword','thumb','metaproductimage','ogproducttitle'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $data = Productcategory::join('categories', 'category_id', 'categorys_id')
            ->join('products', 'productcategories.product_id', 'products.product_id')
            ->join('brands', 'products.brand', 'brands_id')
            ->where('products.is_disabled', 0)
            ->where(function ($query) use ($search) {
                $query
                    ->where('products.product_name', 'LIKE', "%$search")
                    ->orWhere('brand_name', $search)
                    ->orWhere('category_name', 'LIKE', "$search%");
            })
            ->select(['products.product_id', 'brand_name', 'product_name', 'thumbnail', 'slug'])
            ->distinct()
            ->get();
        $mydata = 'Searched Result';
        return view('searchItem')->with(compact('data', 'mydata'));
    }

    public function categorySearch($id)
    {
        $pdata = ProductCategory::where('category_id', $id)->pluck('product_id');
        $catoName = Category::where('categorys_id', $id)->get();
        $categortythumb = Category::where('categorys_id', $id)->pluck('categorythumbnail')->first();
        $ogcategortythumb = "/storage/categorythumbnail/$categortythumb";
        $data = Product::join('brands', 'brand', 'brands_id')
            ->whereIn('product_id', $pdata)
            ->where('is_disabled', 0)
            ->select('products.*', 'brands.*')
            ->get();

        return view('viewproductasDetail')->with(compact('data', 'catoName','ogcategortythumb'));
    }
    public function fetchbyBrand($id)
    {
        $data = Product::join('brands', 'brand', 'brands_id')->where('brand', $id)->get();
        $mydata = Brand::where('brands_id', $id)->value('brand_name');
        return view('searchItem')->with(compact('data', 'mydata'));
    }
    public function newarrivals()
    {
        $mydata = 'New Arrivals';
        $data = Product::join('brands', 'brand', 'brands_id')
            ->where('is_disabled', 0)
            ->orderBy('product_id', 'DESC')->limit(16)
            ->get();
        return view('searchItem')->with(compact('data', 'mydata'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Variation;
use App\Models\Admin\Brand;
use App\Models\admin\Productimage;
use App\Models\admin\Product;
use App\Models\Admin\Productprice;
use App\Models\Admin\Productcategory;
use App\Models\Admin\Productvariation;
use App\Models\addProductBatch;
use Illuminate\Support\Str;

use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::join('brands', 'brand', 'brands_id')
            ->join('users', 'products.addedby', 'users.id')
            ->where('products.status', '=', 'approved')
            ->get();
        return view('admin.Product.ViewProduct')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = "/admin/product/";
        $title = "Add Product";
        $category = Category::all()->where('parent', 0)->where('status', '=', 'approved');
        $brand = Brand::all()->where('status', '=', 'approved');
        $variatioon = Variation::all();
        $data = compact('url', 'title', 'category', 'brand', 'variatioon');
        return view('admin/Product/AddProductForm')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $filename = time() . "." . $request->file('Productthumbfile')->getClientOriginalExtension();
        $request->file('Productthumbfile')->storeAs('public/thumbnails', $filename);
        $addedby = session('user')['id'];
        if (session('user')['role'] == 'Admin' || session('user')['role'] == 'SuperAdmin') {
            $id = Product::create([
                'product_name' => $request->Productname,
                'brand' => $request->Brand,
                'discription' => $request->Productcontent,
                'slug' => Str::slug($request->Productname),
                'lowstockindication' => $request->lowstockindication,
                'addedby' => $addedby,
                'approvedby' => $addedby,
                'thumbnail' => $filename,
                'status' => 'approved',




            ])->product_id;
            return $this->uploadimage($id, $request);
        } else {
            $id =   Product::create([
                'product_name' => $request->Productname,
                'brand' => $request->Brand,
                'discription' => $request->Productcontent,
                'slug' => Str::slug($request->Productname),
                'category' => 1,
                'lowstockindication' => $request->lowstockindication,
                'addedby' => $addedby,
                'thumbnail' => $filename,


            ])->product_id;
            return $this->uploadimage($id, $request);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function uploadimage($id, Request $request)
    {
       
        $image = [];
        foreach ($request->file('Productfile') as $file) {
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/product/', $filename);
            $image[] = $filename;
        }

        Productimage::insert([
            'image' => implode('|', $image),
            'product_id' => $id,
        ]);
        addProductBatch::create([
            'batchid'=>1,
            'product'=>$id,
            'costprice'=>$request->productprice,
            'sellingprice'=>$request->productsprice,
            'availablequantity'=>$request->qty,
            'soldquantity'=> '0',
            'profit'=>'0',
        ]);
        Productprice::create([
            'price' => $request->productprice,
            'product' => $id,
        ]);
        $category = $request->Category;
        for ($i = 0; $i < count($category); $i++) {
            Productcategory::insert([
                'product_id' => $id,
                'category_id' => $category[$i],
            ]);
        }
        // $varition = $request->Varition;
        // $varitionValue = $request->varitionValue;
        // for ($i = 0; $i < count($varition); $i++) {
        //     Productvariation::insert([
        //         'product' => $id,
        //         'variation_id' => $varition[$i],
        //         'variationoption_id' => $varitionValue[$i],
        //     ]);
        // }
        return back();
    }
    public function feature($id)
    {
        $product = Product::find($id);
        // dd($product->featured);
        $product->featured="featured";
        $product->save();
        // $product->update(['featured'=>'']);
        return back();
    }
    public function unfeature($id)
    {
        $product = Product::find($id);
        // $product->update(['featured'=>'featured']);
        $product->featured="unfeatured";
        $product->save();
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Variation;
use App\Models\Admin\Brand;
use App\Models\Admin\Productimage;
use App\Models\Admin\Product;
use App\Models\Admin\Productprice;
use App\Models\Admin\Productcategory;
use App\Models\Admin\Productvariation;
use App\Models\addProductBatch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
        Paginator::useBootstrap();
        $data = Product::join('brands', 'brand', 'brands_id')
            ->join('users', 'products.addedby', 'users.id')
            ->where('products.status', '=', 'approved')->Paginate(5);
        return view('admin.Product.ViewProduct')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = '/admin/product/';
        $title = 'Add Product';
        $category = Category::all()
            ->where('parent', 0)
            ->where('status', '=', 'approved');
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

        $addedby = session('user')['id'];
        if (session('user')['role'] == 'Admin') {
            $file = $request->file('Productthumbfile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/thumbnails/', $filename);
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
            session()->put('AdminSuccess', 'Product Added');
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
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/product/', $filename);
            $image[] = $filename;
        }

        Productimage::insert([
            'image' => implode('|', $image),
            'product_id' => $id,
        ]);
        addProductBatch::create([
            'batchid' => 1,
            'product' => $id,
            'costprice' => $request->productprice,
            'sellingprice' => $request->productsprice,
            'availablequantity' => $request->qty,
            'soldquantity' => '0',
            'profit' => '0',
        ]);

        $category = $request->Category;
        for ($i = 0; $i < count($category); $i++) {
            Productcategory::insert([
                'product_id' => $id,
                'category_id' => $category[$i],
            ]);
        }
        return back();
    }
    public function feature($id)
    {
        $product = Product::find($id);
        // dd($product->featured);
        $product->featured = 'featured';
        $product->save();
        // $product->update(['featured'=>'']);
        return back();
    }
    public function unfeature($id)
    {
        $product = Product::find($id);
        // $product->update(['featured'=>'featured']);
        $product->featured = 'unfeatured';
        $product->save();
        return back();
    }

    public function DisableProduct($id)
    {
        $product = Product::find($id);
        $product->is_disabled = 1;
        $product->save();
        return back();
    }

    public function EnableProduct($id)
    {
        $product = Product::find($id);
        $product->is_disabled = 0;
        $product->save();
        return back();
    }
}

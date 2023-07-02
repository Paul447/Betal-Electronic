<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Pagination\Paginator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Variation;
use App\Models\Admin\Variationoption;
use App\Models\Admin\Productvariation;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;

class AssignAttribute extends Controller
{
   
    public function index()
    {
        Paginator::useBootstrap();
        $distinctProductIds = DB::table('productvariations')
            ->distinct('product')
            ->pluck('product');

        $products = [];

        foreach ($distinctProductIds as $productId) {
            $productData = DB::table('productvariations')
                ->where('product', $productId)
                ->join('products', 'products.product_id', '=', 'productvariations.product')
                ->join('variations', 'variations.variation_id', '=', 'productvariations.variation_id')
                ->join('variationoptions', 'variationoptions.variationoption_id', '=', 'productvariations.variationoption_id')
                ->select('products.product_name as product_name', DB::raw('GROUP_CONCAT(DISTINCT variations.variation_name) as variation_names'), DB::raw('GROUP_CONCAT(DISTINCT variationoptions.value) as option_names'))
                ->groupBy('product_name')
                ->paginate(5);

            $products[$productId] = $productData;
        }
        return view('admin.AssignAttributes.viewassignVariation')->with(compact('products', 'productId', 'productData'));
    }

  
    public function create()
    {
        $url = '/admin/assign/';
        $title = 'Assign attributes';
        $excludepro = Productvariation::distinct('product')->pluck('product');
        $product = Product::whereNotIn('product_id', $excludepro)->get();
        $variationoption = Variationoption::all();
        $data = compact('url', 'product', 'title', 'variationoption');
        return view('admin.AssignAttributes.assignVariation')->with($data);
    }

   
    public function store(Request $request)
    {
        $selectedItems = $request->input('Selectedvalue', []);
        $productdata = $request->input('ChooseProduct');
        foreach ($selectedItems as $selectedItem) {
            [$itemId, $itemName] = explode(':', $selectedItem);
            var_dump($itemId, $itemName);
            Productvariation::create([
                'product' => $productdata,
                'variation_id' => $itemId,
                'variationoption_id' => $itemName,
            ]);
        }
        session()->put('AdminSuccess', 'Attributes assigned to product');
        return redirect('/admin/assign/create');
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        $data = Productvariation::where('product',$id)->pluck('id')->flatten()
        ->toArray();;
        Productvariation::whereIn('id',$data)->delete();
        session()->put('AdminFaliure', 'Attributes Deleted');
        return redirect('admin/assign/');
    }
}

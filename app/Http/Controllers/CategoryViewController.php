<?php

namespace App\Http\Controllers;
use App\Models\Admin\Category;
use App\Models\Admin\Variation;
use App\Models\Admin\Variationoption;
use App\Models\Admin\Productcategory;
use App\Models\Admin\Productimage;
use App\Models\Admin\Product;

class CategoryViewController extends Controller
{
    public function readCategory($id)
    {

        $cato =Category::where('parent', $id)->get();
       
        if (!is_null($cato)) {
            return response()->json(array('cato' => $cato), 200);
        } else {
            return response()->json(array('Error' => "No Records Found"), 404);
        }

    }
    public function readVarition()
    {
        $varValue =Variation::all();
        if (!is_null($varValue)) {
            return response()->json(array('varValue' => $varValue), 200);
        } else {
            return response()->json(array('Error' => "No Records Found"), 404);
        }
    }

    public function readVaritionOption($id)
    {
        $varOptValue =Variationoption::where('variation', $id)->get();
        if (!is_null($varOptValue)) {
            return response()->json(array('varOptValue' => $varOptValue), 200);
        } else {
            return response()->json(array('Error' => "No Records Found"), 404);
        }
    }
    public function viewCategories($id)
    {
        $pdata = ProductCategory::where('category_id', $id)->pluck('product_id');
        $catoName = Category::where('categorys_id',$id)->get('category_name');
        // echo $catoName;
        $data = Product::all()->whereIn('product_id',$pdata);
        // echo $data;
        return view('viewproductasDetail')->with(compact('data','catoName'));
    }
    public function viewCatos(){
        $detail = Category::select('categorys_id')->where('parent',0)->get();
        $hello= Productcategory::select('category_id')
                  ->whereIn('category_id', $detail)
                  ->distinct()
                  ->get();
      
        $mine = Productcategory::select('product_id')->distinct()->whereIn('category_id',$hello)->limit(1)->get();
        foreach($mine as $mime){
            $heck = Product::select('thumbnail')->whereIn('product_id',$mime)->get();
           
        }
        // echo $mine;
        // return view ('categories')->with(compact('heck'));
        
    }
}
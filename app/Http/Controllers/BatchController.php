<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\addProductBatch;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class BatchController extends Controller
{
    public function index()
    {
        $addedby = session('user')['id'];
        if (session('user')['role'] == 'Admin') {
            $data  = DB::table('_batch__migration')->latest('batch_name')->value('batch_name');
            if (isset($data)) {
                $parts = explode(" ", trim($data));
                $part1 = $parts[0];
                $part2 = intval($parts[1]) + 1;
                $newString = $part1 . " " . $part2;
                DB::table('_batch__migration')->insert([
                    'batch_name' => $newString,

                ]);
                session()->put('BatchCreated', 'New Batch Was Created');
            } else {
                DB::table('_batch__migration')->insert([
                    'batch_name' => 'Batch 1',
                ]);
                session()->put('BatchCreated', 'New Batch Was Created');
            }
        }
        return redirect('/home');
    }
    public function create()
    {
        $url = "/admin/batch/";
        return view('admin.batch.batch')->with(compact('url'));
    }
    public function show()
    {
        $url = "/admin/batch/add";
        $batchData = DB::table('_batch__migration')->select('*')->get();
        $productData = Product::select('*')->get();
        return view('admin.batch.addProductBatch')->with(compact('batchData', 'productData', 'url'));
    }

    public function add(Request $request)
    {
        $batch = $request->input('batch');
        $assocProd = $request->input('assobatch');
        $cp = $request->input('costPrice');
        $sp = $request->input('sellprice');
        $productQty = $request->input('pqty');
        addProductBatch::create([
            'batchid' => $batch,
            'product' => $assocProd,
            'costprice' => $cp,
            'sellingprice' => $sp,
            'availablequantity' => $productQty,
            'soldquantity' => '0',
            'profit' => '0',
        ]);
        session()->put('BatchProduct', 'Prodcut Assign To New Batch');
        return redirect('/home');
    }
    public function fetchBatchAssociatesProduct($id)
    {
        $associatedProductBatch = addProductBatch::where('batchid', '=', $id)->pluck('product');
        $productNames = Product::whereNotIn('product_id', $associatedProductBatch)
            ->pluck('product_id');
        $productData = Product::whereIN('product_id', $productNames)->get();

        if (!is_null($productData)) {
            return response()->json(array('productData' => $productData), 200);
        } else {
            return response()->json(array('Error' => "No Records Found"), 404);
        }
    }
}

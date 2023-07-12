<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;

use App\Models\deliverys;
use App\Models\addProductBatch;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $rows = Order::selectRaw('DISTINCT customer, DATE_FORMAT(created_at, "%Y-%m-%d %H:%i:%s") as created_at_minute')
            ->groupBy('customer', 'created_at_minute')
            ->get();
        $data = [];
        // var_dump($rows);
        foreach ($rows as $row) {
            $data[] = [
                'customer' => $row->customer . "<br>",
                'created_at_minute' => $row->created_at_minute . "<br>",
            ];
        }
        $counted = count($data);
        //    echo $counted;

        $productData = Order::select('product')->where('created_at', '=', "2023-04-05 06:15:33")->get();
        $pdata = [];
        foreach ($productData as $p) {
            $pdata[] = [
                'product' => $p->product . "<br>",

            ];
        }
        $data = User::with('ds')->join('municipalities', 'users.municipality', 'municipalities.municipalities_id')
            ->join('districts', 'users.district', '=', 'districts.district_id')
            ->join('provinces', 'users.province', '=', 'provinces.province_id')
            ->where('role', '=', 'user')->where('user_status', '=', 'verified')->get();

        // var_dump($data);
        // $user = User::where('role' , '=' ,'user')->where('user_status','=','verified')->count();
        return view('admin.userData')->with(compact('data'));
    }

    public function create()
    {

        $uniqueValues = Order::select('customer', 'created_at')
            ->distinct()
            ->whereNotIn('created_at', function ($query) {
                $query->select('order_id')->from('deliverys');
            })
            ->groupBy('customer', 'created_at')
            ->get();


        return view('admin.orderDetail');
    }

    public function pendingOrder(Request $request)
    {
        $data_val = deliverys::select('order_id', 'customer_name', 'item', 'location', 'amount', 'status')->where('status', 'pending')->get();
        return view('admin.orderdetailpreview')->with(compact('data_val'));
    }

    public function completeOrder(Request $request)
    {
        $data_val = deliverys::select('order_id', 'customer_name', 'item', 'location', 'amount', 'status')->where('status', 'delivered')->get();
        return view('admin.orderdetailpreview')->with(compact('data_val'));
    }

    public function  orderPDV(Request $request)
    {
        // echo "hello";
        $varr = $request->input('my');
        $orderProDet = Order::where('created_at', '=', $varr)->get();
        $addrr = Order::where('created_at', '=', $varr)->pluck('address')->first();
        $phone = Order::where('created_at', '=', $varr)->pluck('phone')->first();
        // dd($orderProDet);
        return view('admin.orderProDetView')->with(compact('orderProDet', 'varr', 'addrr', 'phone'));
        // $data_val = deliverys::select('order_id','customer_name','item','location','amount','status')->where('status','delivered')->get();
        // return view('admin.orderdetailpreview')->with(compact('data_val'));
    }
    public function calculation(Request $request)
    {

        $batch = DB::table('_batch__migration')->pluck('batch_id');
        $batchname = DB::table('_batch__migration')->get();
        foreach ($batch as $batchId) {
            $profits = addProductBatch::where('batchid', $batchId)->sum('profit');
            $profitsByBatch[$batchId] = $profits;
        }
        return view('admin.calculationView')->with(compact('batchname', 'profitsByBatch'));
    }

    public function viewAllProductProfit($id)
    {
        Paginator::useBootstrap();
        $data = addProductBatch::where('batchid', $id)->join('products', 'add_product_batches.product', '=', 'products.product_id')->Paginate(5);;
        return view('admin.viewBatchesProdDet')->with(compact('data'));
    }
}

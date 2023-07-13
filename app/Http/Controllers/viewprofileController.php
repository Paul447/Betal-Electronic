<?php

namespace App\Http\Controllers;

use App\Models\Admin\User;
use App\Models\Order;
use App\Models\deliverys;

use Illuminate\Http\Request;

class viewprofileController extends Controller
{
    public function viewProfile(Request $request)
    {
        $data = session('customer', 'id');
        $dataArray = json_decode($data, true);
        $id = $dataArray['id'];
        $data = User::where('id', '=', $id)->get();
        return view('customerview')->with(compact('data'));
    }
    public function myorder(Request $request)
    {
        $varr = $request->input('my');
        $dataa = session('customer', 'id');
        $dataArrayy = json_decode($dataa, true);
        $idd = $dataArrayy['id'];
        $mydata = Order::where('customer', $idd)
            ->distinct()
            ->pluck('created_at');
        // echo $mydata;
        // dd($mydata);
        foreach ($mydata as $data) {
            $requestData = deliverys::where('order_id', '=', $data)->first();
            $result[] = $requestData;
        }
        if (isset($result))
            return view('myorder')->with(compact('result'));
        else
            return view('myorder');
    }

    public function mydataView(Request $request)
    {
        $varr = $request->input('my');
        // echo $varr;
        $orderProDet = Order::where('created_at', '=', $varr)->get();
        // echo $orderProDet;

        // $hash = password_hash('hello', PASSWORD_BCRYPT);
        // echo $hash;


        // dd($orderProDet);
        return view('myorderProductDetail')->with(compact('orderProDet'));
        //    return view('myorder')->with(compact('mydata'));
    }
}

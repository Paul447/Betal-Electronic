<?php

namespace App\Http\Controllers;
use App\Models\deliverys;
use App\Models\Order;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $url = "/admin/delivery/add";
       return view('admin.deliverymodule.verifyDeliveryModule')->with(compact('url'));
    }
    public function add(Request $request)
    {
        $url = "/admin/delivery/confirm";
        $ordeid  = $request->input('orderid');
        $deliverystatus = deliverys::where('order_id',$ordeid)->pluck('status')->first();
        // echo $deliverystatus;
        if(strcasecmp($deliverystatus, 'pending') == 0){
            $data = Order::where('created_at',$ordeid)->select('*')->get();
            return view('admin.deliverymodule.viewDelivery')->with(compact('data','url','ordeid'));
        }
        else{
            session()->put('NoOrder', 'Requested Order Is Delivered Previous or Not exist');
            return redirect('/home');
        }
    }
    public function show(Request $request){
        $ordeid  = $request->input('hello');
        deliverys::where('order_id', $ordeid)->update(array('status'=>"delivered"));
        session()->put('deliveredSuccess', 'Order Delivered Successfully');
        return redirect('/home');
    }
}

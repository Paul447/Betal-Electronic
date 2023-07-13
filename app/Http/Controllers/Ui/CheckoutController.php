<?php

namespace App\Http\Controllers\Ui;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\deliverys;
use App\Models\addProductBatch;
use App\Models\Admin\Product;
use App\Models\Admin\Productprice;
use Database\Seeders\addPbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class CheckoutController extends Controller
{
    public function index($quantity, $product_id)
    {
        $product = Product::find($product_id, ['product_name'])->product_name;
        $price = addProductBatch::find($product_id, ['sellingprice'])->sellingprice;
        $total = $price * $quantity;
        return view('checkout')->with(compact('product', 'product_id', 'quantity', 'price', 'total'));
    }
    public function store(Request $request)
    {
        $selectedproductCartID = json_decode($request->input('selectedProductId'));
        $totalCartAmountRequest = json_decode($request->input('totalCartData'));
        $productQuantity = json_decode($request->input('selectedCart'));
        $selectedProductName = json_decode($request->input('pname'));
        $customerID = session('customer')['id'];
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $zipcode = $request->input('zipcode');


        $pIDdata = $request->input('selectedProductId');
        // $pqty = $request->input('selectedCart'); 
        Cache::put('my_data_1', $selectedproductCartID, 60);
        Cache::put('my_data_2', $productQuantity, 60);
        Cache::put('my_data_3', $name, 60);
        Cache::put('my_data_4', $address, 60);
        Cache::put('my_data_5', $phone, 60);
        Cache::put('my_data_6', $zipcode, 60);
        return view('confrim')->with(compact('totalCartAmountRequest', 'selectedProductName', 'productQuantity'));
    }
    public function datastore(Request $request)
    {
        $productIdd = Cache::get('my_data_1');

        $productQuantity = Cache::get('my_data_2');
        $name = Cache::get('my_data_3');

        $address = Cache::get('my_data_4');
        $phone = Cache::get('my_data_5');
        $zipcode = Cache::get('my_data_6');
        $customerID = session('customer')['id'];
        $mydata = $request['q'];

        if ($mydata == "su") {

            foreach ($productIdd as $key => $procarId) {
                $cartquantity = $productQuantity[$key];
                $productPrice = addProductBatch::where('product', $procarId)
                    ->latest()
                    ->first();
                $productPricee =  $productPrice['sellingprice'] * $cartquantity;
                Order::create([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'zipcode' => $zipcode,
                    'paymentstatus' => "verified",
                    'customer' => $customerID,
                    'product' => $procarId,
                    'quantity' => $cartquantity,
                    'price' => $productPricee,
                ]);

                $availabeqtyDetail = DB::table('add_product_batches')
                    ->where('product', $procarId)->whereNotNull('availablequantity')
                    ->where('availablequantity', '<>', 0)
                    ->orderBy('batchid', 'asc')->limit(1)->pluck('availablequantity')->first();

                $newAvailabeQty = $availabeqtyDetail - $cartquantity;

                $soldqty = DB::table('add_product_batches')
                    ->where('product', $procarId)->whereNotNull('availablequantity')
                    ->where('availablequantity', '<>', 0)
                    ->orderBy('batchid', 'asc')->limit(1)->pluck('soldquantity')->first();

                $soldQuantity = $soldqty + $cartquantity;

                $costPrice = DB::table('add_product_batches')
                    ->where('product', $procarId)->whereNotNull('availablequantity')
                    ->where('availablequantity', '<>', 0)
                    ->orderBy('batchid', 'asc')->limit(1)->pluck('costprice')->first();


                $sellprice = DB::table('add_product_batches')
                    ->where('product', $procarId)->whereNotNull('availablequantity')
                    ->where('availablequantity', '<>', 0)
                    ->orderBy('batchid', 'asc')->limit(1)->pluck('sellingprice')->first();


                $average = $sellprice - $costPrice;
                $productProfit = $average * $soldQuantity;
                addProductBatch::where('product', $procarId)->update(array('availablequantity' => $newAvailabeQty, 'soldquantity' => $soldQuantity, 'profit' => $productProfit));
            }

            $uniqueValues = Order::select('customer', 'created_at')
                ->distinct()
                ->whereNotIn('created_at', function ($query) {
                    $query->select('order_id')->from('deliverys');
                })
                ->groupBy('customer', 'created_at')
                ->get();

            foreach ($uniqueValues as $row) {
                $countOrder = Order::where('created_at', $row->created_at)->count();

                $sumByCreatedDate = Order::selectRaw('created_at, sum(price) as total')
                    ->where('created_at', $row->created_at)
                    ->groupBy('created_at')
                    ->first();


                $fetch_name = Order::where('created_at', $row->created_at)->pluck('name')->first();
                $fetch_address = Order::where('created_at', $row->created_at)->pluck('address')->first();
                deliverys::create([
                    'order_id' => $row->created_at,
                    'customer_name' => $fetch_name,
                    'item' => $countOrder,
                    'location' => $fetch_address,
                    'amount' => $sumByCreatedDate['total'],
                    'status' => "Pending",
                ]);
            }

            session()->put('SuccessfullyPaid', 'Payment Successful !! Your Order is in Process');
            return redirect('CartView');
        } else {
            session()->put('UnsuccessfullyPaid', 'Payment Unsuccessful !!');
            return redirect('CartView');
        }
    }

    public function confirm(Request $request)
    {
        $data = $request->input();
        Cache::put('name', $request->name, 60);
        Cache::put('address', $request->address, 60);
        Cache::put('phone', $request->phone, 60);
        Cache::put('zipcode', $request->zipcode, 60);
        Cache::put('product_id', $request->product_id, 60);
        Cache::put('quantity', $request->quantity, 60);
        Cache::put('total', $request->total, 60);
        return view('buy_confirm')->with(compact('data'));
    }

    public function store_buy_data(Request $request)
    {
        $name = Cache::get('name');
        $address = Cache::get('address');
        $phone = Cache::get('phone');
        $zipcode = Cache::get('zipcode');
        $product_id = Cache::get('product_id');
        $quantity = Cache::get('quantity');
        $total_price = Cache::get('total');
        $customer_id = Session('customer')['id'];

        if ($request->q == "su") {

            $order_id = Order::create([
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'zipcode' => $zipcode,
                'paymentstatus' => "verified",
                'customer' => $customer_id,
                'product' => $product_id,
                'quantity' => $quantity,
                'price' => $total_price,
            ])->created_at;

            $product_batch = addProductBatch::find($product_id);

            $available_product_quantity = $product_batch->availablequantity - $quantity;
            $product_sold_quantity = $product_batch->soldquantity + $quantity;
            $profit = ($product_batch->sellingprice - $product_batch->costprice) * $product_sold_quantity;
            $product_batch->update(['availablequantity' => $available_product_quantity, 'soldquantity' => $product_sold_quantity, 'profit' => $profit]);

            deliverys::create([
                'order_id' => $order_id,
                'customer_name' => $name,
                'item' => 1,
                'location' => $address,
                'amount' => $total_price,
                'status' => "Pending",
            ]);

            session()->put('SuccessfullyPaid', 'Payment Successful !! Your Order is in Process');
            return redirect('/');
        } else {
            session()->put('UnsuccessfullyPaid', 'Payment Unsuccessful !!');
            return redirect('/');
        }
    }
}

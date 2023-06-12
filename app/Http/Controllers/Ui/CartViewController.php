<?php

namespace App\Http\Controllers\ui;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Admin\Product;
use App\Models\Admin\Productprice;
use App\Models\Admin\Productimage;

class CartViewController extends Controller
{
    public function index()
    {
        if(is_null(session('customer'))){
            $mydata = session()->put('logError', 'Please Login First');
            return view('login')->with(compact('mydata'));
        }
        $userId = session('customer')['id'];
        $productIddata = Cart::where('user','=', $userId)->join('products','carts.product','=','products.product_id')->get();
        $max = Cart::where('user','=', $userId)->sum('subtotal');
        
        // if (!is_null($productIddata && $max)) {
        //     return response()->json(array('pData' => $productIddata, 'mydata'=>$max ), 200);
        // } else {
        //     return response()->json(array('Error' => "No Records Found"), 404);
        // }
        // $data = compact('productIddata','max');
        // return response()->json(array('pidData' => $productIddata, 'max'=>$max), 200);
        // return response()->json($data);

        // $rows = Order::select('created_at')
        // ->groupBy('created_at')
        // ->havingRaw('COUNT(*) > 1')
        // ->get();

        // $timestamps = $rows->pluck('created_at');

        //  $products = Order::whereIn('created_at', $timestamps)
        //     ->select('id')
        //     ->get();

        //     echo $products."<br>";
        
        // foreach ($rows as $row) {
        //     $createdAt = $row->created_at;
        //     $count = Order::where('created_at', '=', $createdAt)->count();
        //     echo $row;
        //     echo $count."<br>";
        //     if ($count > 1) {
        //         // Rows with the same created_at timestamp found
        //         // Do something with the rows, such as retrieve them or update them
        //     }
        // }
        // var_dump($rows);
      
        //    var_dump($pdata);
        // $notsameCreatedAt = Order::distinct('created_at')
        // ->get(['created_at']);
        // dd($notsameCreatedAt);
        return view('myCart')->with(compact('productIddata','max'));
        // return view('myCart');
    }

    public function store(Request $request)
    {
        return view('login');
    }

    public function storedata($id)
    {
        $pID = $id;
        $customerId =session('customer')['id'] ;
        $productname = Product::select('product_name')->where('product', '=', $pID);
        $findExistingProduct = Cart::where('product', '=', $pID)->where('user','=',$customerId)->get();
        $productPrice = Productprice::where('product', '=', $pID)->pluck('price');
        $wordCount = $findExistingProduct->count();
        if ($wordCount > 0) {
            $qty = Cart::select('quantity')->where('product', $pID)->get();
            $updatedQty = $qty[0]->quantity + 1;
            $subbTTl = $updatedQty * $productPrice[0];
            Cart::where('product', $pID)->update(array('quantity' => $updatedQty,'subtotal'=>$subbTTl));
            // session()->put('QtyUpdated', );

            return response()->json(['status' => "Item Quantity Updated To " .$updatedQty]);
            // Sesssion::set('itemIncresed') = ""; 
        } 
        else {
                $subTotal = $productPrice[0];

                Cart::create([
                'product' => $pID ,
                'user' => $customerId,
                'quantity'=> '1',
                'subtotal'=> $subTotal,
            ]);
            return response()->json(['status' => "Item Added To Cart"]);
        }   

    }
    public function storedataa($id ,$hel)
    {
       $qtyAmount =$id;
       $pId = $hel;
       $customerID = session('customer')['id'];
       $findexistingProduct = Cart::where('product', '=', $pId)->where('user','=',$customerID)->get();
       $pproductPrice = Productprice::where('product', '=', $pId)->pluck('price');
       $worDCount = $findexistingProduct->count();
       if ($worDCount > 0) {
        $qtty = Cart::select('quantity')->where('product', $pId)->get();
        $updatedQTy = $qtty[0]->quantity + $qtyAmount;
        $subttl = $updatedQTy * $pproductPrice[0];
        Cart::where('product', $pId)->update(array('quantity' => $updatedQTy,'subtotal'=>$subttl));
       }
       else{
        $subTtotal = $qtyAmount * $pproductPrice[0];
        Cart::create([
            'product' => $pId ,
            'user' => $customerID,
            'quantity'=> $qtyAmount,
            'subtotal'=> $subTtotal,
        ]);
       }
       return view('login');

    }
    public function inc($inpvalue ,$productId){
        $qtyAmount =$inpvalue;
        $pId = $productId;
        $customerID = session('customer')['id'];
        $findexistingProduct = Cart::where('product', '=', $pId)->where('user','=',$customerID)->get();
        $pproductPrice = Productprice::where('product', '=', $pId)->pluck('price');
        $worDCount = $findexistingProduct->count();
        if ($worDCount > 0) {
         $qtty = Cart::select('quantity')->where('product', $pId)->get();
         $updatedQTy = $qtty[0]->quantity + $qtyAmount;
         if($updatedQTy == 0){
           $updatedQTy = 1;
         }
         else{
         $subttl = $updatedQTy * $pproductPrice[0];
         Cart::where('product', $pId)->update(array('quantity' => $updatedQTy,'subtotal'=>$subttl));
         return response()->json(['changedQty' => "Product Quantity Changed To " .$updatedQTy]);
        }
        }
    }
    public function destroy($id)
    {
        $data = Cart::find($id);
        $data->delete();
        session()->put('DeletedItem', 'Item Deleted From Cart');
        return back();

    }
  
}
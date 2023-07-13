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
use App\Models\addProductBatch;

class CartViewController extends Controller
{
    public function index()
    {
        if (is_null(session('customer'))) {
            $mydata = session()->put('uifail', 'Please Login First');
            return view('login')->with(compact('mydata'));
        }
        $userId = session('customer')['id'];
        $productIddata = Cart::where('user', '=', $userId)
            ->join('products', 'carts.product', '=', 'products.product_id')
            ->get();
        $max = Cart::where('user', '=', $userId)->sum('subtotal');
        return view('myCart')->with(compact('productIddata', 'max'));
    }

    public function store(Request $request)
    {
        return view('login');
    }

    public function storedata($id, $quantity, $reset = 0)
    {
        $pID = $id;
        $customerId = session('customer')['id'];
        $productname = Product::select('product_name')->where('product', '=', $pID);
        $findExistingProduct = Cart::where('product', '=', $pID)
            ->where('user', '=', $customerId)
            ->get();
        $productPrice = DB::table('add_product_batches')
            ->where('product', $pID)
            ->whereNotNull('availablequantity')
            ->where('availablequantity', '<>', 0)
            ->orderBy('batchid', 'asc')
            ->limit(1)
            ->pluck('sellingprice')
            ->first();

        $wordCount = $findExistingProduct->count();
        $available_quantity = addProductBatch::find($id)->availablequantity;
        if ($wordCount > 0) {
            $qty = Cart::select('quantity')
                ->where('product', $pID)
                ->get();
            if ($reset) {
                if ($available_quantity < $quantity || $quantity <= 0) {
                    return response()->json(['uifail' => 'Invalid Item Quantity ' . $quantity]);
                }
                $updatedQty = $quantity;
                $subbTTl = $updatedQty * $productPrice[0];
            } else {
                $updatedQty = $qty[0]->quantity + $quantity;
                if ($available_quantity < $updatedQty || $updatedQty <= 0) {
                    return response()->json(['uifail' => 'Invalid Item Quantity ' . $updatedQty]);
                }
                $subbTTl = $updatedQty * $productPrice;
            }
            Cart::where('product', $pID)->update(['quantity' => $updatedQty, 'subtotal' => $subbTTl]);
            return response()->json(['uisuccess' => 'Item Quantity Updated To ' . $updatedQty]);
        } else {
            $subTotal = $productPrice * $quantity;
            if ($available_quantity < $quantity || $quantity <= 0) {
                return response()->json(['uifail' => 'Invalid Item Quantity ' . $quantity]);
            }
            Cart::create([
                'product' => $pID,
                'user' => $customerId,
                'quantity' => $quantity,
                'subtotal' => $subTotal,
            ]);
            return response()->json(['uisuccess' => 'Item Added To Cart']);
        }
    }
    public function inc($inpvalue, $productId)
    {
        $qtyAmount = $inpvalue;
        $pId = $productId;
        $customerID = session('customer')['id'];
        $findexistingProduct = Cart::where('product', '=', $pId)
            ->where('user', '=', $customerID)
            ->get();
        $pproductPrice = DB::table('add_product_batches')
            ->where('product', $pId)
            ->whereNotNull('availablequantity')
            ->where('availablequantity', '<>', 0)
            ->orderBy('batchid', 'asc')
            ->limit(1)
            ->pluck('sellingprice')
            ->first();
        $worDCount = $findexistingProduct->count();
        $available_quantity = addProductBatch::find($productId)->availablequantity;
        if ($worDCount > 0) {
            $qtty = Cart::select('quantity')
                ->where('product', $pId)
                ->get();
            $updatedQTy = $qtty[0]->quantity + $qtyAmount;
            if ($available_quantity < $updatedQTy || $updatedQTy <= 0) {
                // change status message div
                return response()->json(['uisuccess' => 'Invalid Item Quantity ' . $updatedQTy]);
            }
            if ($updatedQTy == 0) {
                $updatedQTy = 1;
            } else {
                $subttl = $updatedQTy * $pproductPrice;
                Cart::where('product', $pId)->update(['quantity' => $updatedQTy, 'subtotal' => $subttl]);
                return response()->json(['uisuccess' => 'Product Quantity Changed To ' . $updatedQTy]);
            }
        }
    }
    public function destroy($id)
    {
        $data = Cart::find($id);
        $data->delete();
        session()->put('uisuccess', 'Item Deleted From Cart');
        return back();
    }
    public function termncondition()
    {
        return view('TermandCondition');
    }
    public function aboutbetal()
    {
        return view('aboutbetal');
    }
}

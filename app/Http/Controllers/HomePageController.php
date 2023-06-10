<?php

namespace App\Http\Controllers;

use App\Models\admin\Product;
use App\Models\Order;
use App\Models\Admin\Productprice;
use Illuminate\Http\Request;
use App\Models\admin\User;
use App\Models\addProductBatch;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function homeView(Request $request)
    {
        $hello = Product::count();
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
        $user = User::where('role', '=', 'user')->where('user_status', '=', 'verified')->count();
        $reveneu = Order::sum('price');


        $totalRevenue = addProductBatch::where('soldquantity', '>', 0)
            ->select(DB::raw('SUM(sellingprice * soldquantity) - SUM(soldquantity * costprice) as revenue'))
            ->first()->revenue;

        $percentageCalculation = addProductBatch::where('soldquantity', '>', 0)
            ->select(DB::raw('SUM(soldquantity * costprice) as percentage'))
            ->first()->percentage;



        if ($percentageCalculation == 0) $percentageCalculation = 1;
        $perc = $totalRevenue / $percentageCalculation * 100;

        $formattedNum = number_format($perc, 1);

        $dataa = DB::table('add_product_batches')->select('batchid', 'sellingprice', 'costprice', 'availablequantity', 'soldquantity')->get();

        $salesData = [];

        foreach ($dataa as $row) {
            $batchNumber = $row->batchid;
            $quantitySold = $row->soldquantity;
            $availableQuantity = $row->availablequantity - $row->soldquantity;

            // If the batch number is not yet in the sales data array, add it as a new entry
            if (!isset($salesData[$batchNumber])) {
                $salesData[$batchNumber] = [
                    'batch_number' => $batchNumber,
                    'quantity_sold' => $quantitySold,
                    'available_quantity' => $availableQuantity,
                ];
            } else {
                // If the batch number already exists in the sales data array, update the sold and available quantities
                $salesData[$batchNumber]['quantity_sold'] += $quantitySold;
                $salesData[$batchNumber]['available_quantity'] += $availableQuantity;
            }
        }
        $datum = DB::table('add_product_batches')->select('batchid', 'sellingprice', 'costprice', 'availablequantity', 'soldquantity', 'profit')->get();
        $result = DB::table('add_product_batches')
            ->selectRaw('(sellingprice - costprice) * availablequantity as profit')
            ->get();
        $totalProfit = $result->sum('profit');
        // echo $totalProfit;
        $salesDatum = [];
        foreach ($datum as $roww) {
            $batchNumber = $roww->batchid;
            $profit = $roww->profit;

            // echo $marginPrice;
            $quantitySold = $roww->soldquantity;
            $availableQuantity = $roww->availablequantity - $roww->soldquantity;
            //  $needProfit = $availableQuantity * $marginPrice;
            if (!isset($salesDatum[$batchNumber])) {
                $salesDatum[$batchNumber] = [
                    'batch_number' => $batchNumber,
                    'Achieved_Profit' => $profit,
                    'Milestone_Profit' => $totalProfit,
                ];
            } else {
                // If the batch number already exists in the sales data array, update the sold and available quantities
                $salesDatum[$batchNumber]['Achieved_Profit'] += $profit;
                $salesDatum[$batchNumber]['Milestone_Profit'] += $totalProfit;
            }
        }
        return view('admin/index')->with(compact('hello', 'counted', 'user', 'reveneu', 'formattedNum', 'salesData', 'salesDatum'));
    }
}

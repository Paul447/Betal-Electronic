<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\addProductBatch;
class addPbatch extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            ['batchid'=>"1",'product'=>"1", 'costprice'=>"2499",'sellingprice'=>"3000",'availablequantity'=>"50",'soldquantity'=>"0",'profit'=>"0" ],
            ['batchid'=>"1",'product'=>"2", 'costprice'=>"800",'sellingprice'=>"1000" ,'availablequantity'=>"50" ,'soldquantity'=>"0" , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"3", 'costprice'=>"10600",'sellingprice'=>"12000",'availablequantity'=>"50",'soldquantity'=>"0" , 'profit'=>"0"   ],
            ['batchid'=>"1",'product'=>"4", 'costprice'=>"5499",'sellingprice'=>"6000" ,'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"5", 'costprice'=>"7399",'sellingprice'=>"8000" ,'availablequantity'=>"50",'soldquantity'=>"0"   , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"6", 'costprice'=>"1490" ,'sellingprice'=>"1500",'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"7", 'costprice'=>"4999",'sellingprice'=>"6000" ,'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"8", 'costprice'=>"1133",'sellingprice'=>"2000" ,'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"9", 'costprice'=>"595" ,'sellingprice'=>"1000" ,'availablequantity'=>"50",'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"10", 'costprice'=>"1299" ,'sellingprice'=>"1700" ,'availablequantity'=>"50",'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"11", 'costprice'=>"52000",'sellingprice'=>"53000"  ,'availablequantity'=>"50" ,'soldquantity'=>"0" , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"12", 'costprice'=>"26000" ,'sellingprice'=>"30000",'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"13", 'costprice'=>"110000" ,'sellingprice'=>"120000" ,'availablequantity'=>"50",'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"14", 'costprice'=>"81000" ,'sellingprice'=>"90000" ,'availablequantity'=>"50" ,'soldquantity'=>"0" , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"15", 'costprice'=>"185000" ,'sellingprice'=>"200000" ,'availablequantity'=>"50",'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"16", 'costprice'=>"104000",'sellingprice'=>"115000",'availablequantity'=>"50"  ,'soldquantity'=>"0" , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"17", 'costprice'=>"84000" ,'sellingprice'=>"90000",'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"18", 'costprice'=>"70000" ,'sellingprice'=>"80000" ,'availablequantity'=>"50" ,'soldquantity'=>"0" , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"19", 'costprice'=>"62500" ,'sellingprice'=>"70000" ,'availablequantity'=>"50" ,'soldquantity'=>"0" , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"20", 'costprice'=>"19800" ,'sellingprice'=>"30000",'availablequantity'=>"50" ,'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"21", 'costprice'=>"10999" ,'sellingprice'=>"15000" ,'availablequantity'=>"50",'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"22", 'costprice'=>"21500" ,'sellingprice'=>"30000" ,'availablequantity'=>"50",'soldquantity'=>"0"  , 'profit'=>"0"],
            ['batchid'=>"1",'product'=>"23", 'costprice'=>"12999" ,'sellingprice'=>"15000" ,'availablequantity'=>"50" ,'soldquantity'=>"0" , 'profit'=>"0"],
        ];
        addProductBatch::insert($data);
    }
}

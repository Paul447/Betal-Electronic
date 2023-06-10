<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Admin\Productprice;

class ProductpriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            ['product'=>"1", 'price'=>"2499" ],
            ['product'=>"2", 'price'=>"800" ],
            ['product'=>"3", 'price'=>"10600" ],
            ['product'=>"4", 'price'=>"5499" ],
            ['product'=>"5", 'price'=>"7399" ],
            ['product'=>"6", 'price'=>"1490" ],
            ['product'=>"7", 'price'=>"4999" ],
            ['product'=>"8", 'price'=>"1133" ],
            ['product'=>"9", 'price'=>"595" ],
            ['product'=>"10", 'price'=>" 1299" ],
            ['product'=>"11", 'price'=>"52000" ],
            ['product'=>"12", 'price'=>"26000" ],
            ['product'=>"13", 'price'=>"110000" ],
            ['product'=>"14", 'price'=>"81000" ],
            ['product'=>"15", 'price'=>"185000" ],
            ['product'=>"16", 'price'=>"104000" ],
            ['product'=>"17", 'price'=>"84000" ],
            ['product'=>"18", 'price'=>"70000" ],
            ['product'=>"19", 'price'=>"62500" ],
            ['product'=>"20", 'price'=>"19800" ],
            ['product'=>"21", 'price'=>"10999" ],
            ['product'=>"22", 'price'=>"21500" ],
            ['product'=>"23", 'price'=>"12999" ],
        ];
        Productprice::insert($data);
    }
}

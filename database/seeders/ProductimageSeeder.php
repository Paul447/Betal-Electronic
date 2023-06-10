<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\admin\Productimage;

class ProductimageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['product_id' => "1", 'image' => "havitmouse.jpg|mousepic1.jpeg"],
            ['product_id' => "2", 'image' => "logictechmouse.jpg|mousepic2.jpeg"],
            ['product_id' => "3", 'image' => "dellmouse.jpg|mousepic3.jpeg"],
            ['product_id' => "4", 'image' => "fantechmouse.jpg|mousepic4.jpeg"],
            ['product_id' => "5", 'image' => "dell-2mouse.jpg|mousepic5.jpg"],
            ['product_id' => "6", 'image' => "logictechkeyboard.jpg|keyboardpic1.jpg"],
            ['product_id' => "7", 'image' => "rapookeybard.jpg|keyboardpic2.png"],
            ['product_id' => "8", 'image' => "Rapookeyboard2.jpg|keyboardpic3.jpg"],
            ['product_id' => "9", 'image' => "logitechkeyboard2.jpg|keyboardpic4.jpg"],
            ['product_id' => "10", 'image' => "lenovokeyboard.jpg|keyboardpic5.jpg"],
            ['product_id' => "11", 'image' => "pnygraphic.jpg|graphicpic1.jpg"],
            ['product_id' => "12", 'image' => "msigraphic.jpg|graphicpic2.jpg"],
            ['product_id' => "13", 'image' => "asusgraphic.jpg|graphicpic3.jpg"],
            ['product_id' => "14", 'image' => "ocpcgraphic.jpg|graphicpic4.jpg"],
            ['product_id' => "15", 'image' => "galaxgraphic.jpg|graphicpic5.jpg"],
            ['product_id' => "16", 'image' => "xcpu2.jpg|cpupic1.png"],
            ['product_id' => "17", 'image' => "i9cpu.jpg|cpupic2.png"],
            ['product_id' => "18", 'image' => "amdcpu.webp|cpupic3.jpg"],
            ['product_id' => "19", 'image' => "ryzen.jpg|cpupic4.png"],
            ['product_id' => "20", 'image' => "amdr2.png|cpupic5.jpg"],
            ['product_id' => "21", 'image' => "case1.jpg|casepic1.jfif"],
            ['product_id' => "22", 'image' => "case2.jpg|casepic2.jpg"],
            ['product_id' => "23", 'image' => "case3.jpg|case3.jpg"],
        ];
        Productimage::insert($data);
    }
}

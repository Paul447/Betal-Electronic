<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Productcategory;

class ProductcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['product_id' => '1', 'category_id' => '1'],
            ['product_id' => '1', 'category_id' => '16'],
            ['product_id' => '2', 'category_id' => '1'],
            ['product_id' => '2', 'category_id' => '15'],
            ['product_id' => '3', 'category_id' => '1'],
            ['product_id' => '3', 'category_id' => '15'],
            ['product_id' => '4', 'category_id' => '1'],
            ['product_id' => '4', 'category_id' => '16'],
            ['product_id' => '5', 'category_id' => '1'],
            ['product_id' => '5', 'category_id' => '15'],
            ['product_id' => '6', 'category_id' => '2'],
            ['product_id' => '6', 'category_id' => '17'],
            ['product_id' => '7', 'category_id' => '2'],
            ['product_id' => '7', 'category_id' => '18'],
            ['product_id' => '8', 'category_id' => '2'],
            ['product_id' => '8', 'category_id' => '17'],
            ['product_id' => '9', 'category_id' => '2'],
            ['product_id' => '9', 'category_id' => '18'],
            ['product_id' => '10', 'category_id' => '2'],
            ['product_id' => '10', 'category_id' => '17'],
            ['product_id' => '11', 'category_id' => '3'],
            ['product_id' => '12', 'category_id' => '3'],
            ['product_id' => '13', 'category_id' => '3'],
            ['product_id' => '14', 'category_id' => '3'],
            ['product_id' => '15', 'category_id' => '3'],
            ['product_id' => '16', 'category_id' => '4'],
            ['product_id' => '16', 'category_id' => '19'],
            ['product_id' => '17', 'category_id' => '4'],
            ['product_id' => '17', 'category_id' => '19'],
            ['product_id' => '18', 'category_id' => '4'],
            ['product_id' => '18', 'category_id' => '20'],
            ['product_id' => '19', 'category_id' => '4'],
            ['product_id' => '19', 'category_id' => '20'],
            ['product_id' => '20', 'category_id' => '4'],
            ['product_id' => '20', 'category_id' => '20'],
            ['product_id' => '21', 'category_id' => '5'],
            ['product_id' => '21', 'category_id' => '21'],
            ['product_id' => '22', 'category_id' => '5'],
            ['product_id' => '22', 'category_id' => '21'],
            ['product_id' => '23', 'category_id' => '5'],
            ['product_id' => '23', 'category_id' => '22'],
        ];
        Productcategory::insert($data);
    }
}

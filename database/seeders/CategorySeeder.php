<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category_name' => 'Mouse', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Keyboard', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Graphic Card', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'CPU', 'parent' => '0', 'addedby' => '1', 'categorythumbnail' => 'xyz', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Computer Case', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Cable', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Storage', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Cooling', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Memory', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Monitor', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Motherboard', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Power Supply', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Laptops', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'UPS', 'parent' => '0', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Optical Mouse', 'parent' => '1', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Gaming Mouse', 'parent' => '1', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Standard Keyboard', 'parent' => '2', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Gaming Keyboard', 'parent' => '2', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Intel', 'parent' => '4', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'AMD', 'parent' => '4', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Normal Case', 'parent' => '5', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Gamming Case', 'parent' => '5', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'HDMI', 'parent' => '6', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'VGA', 'parent' => '6', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Display Port', 'parent' => '6', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'USB', 'parent' => '6', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Multiport Adapter', 'parent' => '6', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Internal HDD and SSD', 'parent' => '7', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'External HDD and SDD', 'parent' => '7', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Flash Drive', 'parent' => '7', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Cooling Fan', 'parent' => '8', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Thermal Paste', 'parent' => '8', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'RAM', 'parent' => '9', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'ROM', 'parent' => '9', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'LED Monitor', 'parent' => '10', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'LCD Monitor', 'parent' => '10', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'OLED Monitor', 'parent' => '10', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Curved Monitor', 'parent' => '10', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Standard Motherboard', 'parent' => '11', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Gaming Motherboard', 'parent' => '11', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Dell', 'parent' => '13', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'MSI', 'parent' => '13', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'ASUS', 'parent' => '13', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Lenovo', 'parent' => '13', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'HP', 'parent' => '13', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
            ['category_name' => 'Apple', 'parent' => '13', 'categorythumbnail' => 'xyz', 'addedby' => '1', 'approvedby' => '1', 'status' => 'approved', 'meta_desc' => 'This is meta description'],
        ];
        Category::insert($data);
    }
}

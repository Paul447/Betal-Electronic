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
            ['category_name' => "Mouse" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Keyboard" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Graphic Card" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "CPU" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Computer Case" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Cable" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Storage" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Cooling" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Memory" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Monitor" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Motherboard" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Power Supply" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Laptops" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "UPS" , 'parent' =>"0", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Optical Mouse" , 'parent' =>"1", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Gaming Mouse" , 'parent' =>"1", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Standard Keyboard" , 'parent' =>"2", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Gaming Keyboard" , 'parent' =>"2", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Intel" , 'parent' =>"4", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "AMD" , 'parent' =>"4", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Normal Case" , 'parent' =>"5", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Gamming Case" , 'parent' =>"5", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "HDMI" , 'parent' =>"6", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "VGA" , 'parent' =>"6", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Display Port" , 'parent' =>"6", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "USB" , 'parent' =>"6", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Multiport Adapter" , 'parent' =>"6", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Internal HDD and SSD" , 'parent' =>"7", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "External HDD and SDD" , 'parent' =>"7", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Flash Drive" , 'parent' =>"7", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Cooling Fan" , 'parent' =>"8", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Thermal Paste" , 'parent' =>"8", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "RAM" , 'parent' =>"9", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "ROM" , 'parent' =>"9", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "LED Monitor" , 'parent' =>"10", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "LCD Monitor" , 'parent' =>"10", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "OLED Monitor" , 'parent' =>"10", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Curved Monitor" , 'parent' =>"10", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Standard Motherboard" , 'parent' =>"11", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Gaming Motherboard" , 'parent' =>"11", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Dell" , 'parent' =>"13", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "MSI" , 'parent' =>"13", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "ASUS" , 'parent' =>"13", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Lenovo" , 'parent' =>"13", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "HP" , 'parent' =>"13", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
            ['category_name' => "Apple" , 'parent' =>"13", 'addedby' =>'1', 'approvedby'=>'1' , 'status'=> "approved" ],
        ];
        Category::insert($data);
    }
}

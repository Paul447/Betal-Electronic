<?php

namespace Database\Seeders;

use App\Models\Admin\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['banner_img' => 'banner_1.png', 'image_alt_text' => 'banner_1', 'meta_description' => 'this is first description'],
            ['banner_img' => 'banner_2.png', 'image_alt_text' => 'banner_2', 'meta_description' => 'this is second description'],
        ];
        Banner::insert($data);
    }
}

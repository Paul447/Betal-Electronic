<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['province' => 'Province 1'],
            ['province' => 'Province 2'],
            ['province' => 'Province 3'],
            ['province' => 'Province 4'],
            ['province' => 'Province 5'],
            ['province' => 'Province 6'],
            ['province' => 'Province 7'],
        ];

        Province::insert($data);
    }
}

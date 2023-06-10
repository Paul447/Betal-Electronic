<?php

namespace Database\Seeders;

use App\Models\admin\Batch_Migration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Batch_MigrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['batch_name'=>'testBatch'];
        Batch_Migration::insert($data);
    }
}

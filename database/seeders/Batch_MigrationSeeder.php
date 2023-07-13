<?php

namespace Database\Seeders;

use App\Models\Admin\Batch_Migration;
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
                $data = ['batch_name' => 'Batch 1'];
                Batch_Migration::insert($data);
        }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\Category;
use App\Models\Admin\Productcategory;
use App\Models\admin\Productimage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
           ProvinceSeeder::class,
           DistrictSeeder::class,
           MunicipalitySeeder::class,
           UserSeeder::class,
           BrandSeeder::class,
           CategorySeeder::class,
           ProductSeeder::class,
           ProductpriceSeeder::class,
           ProductimageSeeder::class,
           ProductcategorySeeder::class,
           Batch_MigrationSeeder::class,
           addPbatch::class,
        ]);
    }
}

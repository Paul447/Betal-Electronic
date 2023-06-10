<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
Use App\Models\admin\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $data=
            [
                'user_name' => 'Subesh Raj Pandey' ,
                'email' => 'pandeypaul137@gmail.com',
                'password' => Hash::make('12345'),
                'role'=>'SuperAdmin',
                'contact'=>'098765577',
                'province'=>1,
                'district'=>1,
                'municipality'=>1,
                'image' =>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSnfH0peqWY3SiSX7AuaEV_GNTr7VnkQukJA&usqp=CAU',
                'ward'=>1,
                'createdby'=>'system',
            ];
            User::insert($data);


    }
}

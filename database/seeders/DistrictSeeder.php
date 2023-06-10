<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;
class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['province' => '1', 'district' => "Bhojpur"],
            ['province' => '1', 'district' => "Dhankuta"],
            ['province' => '1', 'district' => "Ilam"],
            ['province' => '1', 'district' => "Jhapa"],
            ['province' => '1', 'district' => "Khotang"],
            ['province' => '1', 'district' => "Morang"],
            ['province' => '1', 'district' => "Okhaldhunga"],
            ['province' => '1', 'district' => "Panchthar"],
            ['province' => '1', 'district' => "Taplejung"],
            ['province' => '1', 'district' => "Terhathum"],
            ['province' => '1', 'district' => "Sankhuwasabha"],
            ['province' => '1', 'district' => "Solukhumbhu"],
            ['province' => '1', 'district' => "Sunsari"],
            ['province' => '1', 'district' => "Udayapur"],


            ['province' => '2', 'district' => " Bara "],
            ['province' => '2', 'district' => " Dhanusa "],
            ['province' => '2', 'district' => " Mahottari "],
            ['province' => '2', 'district' => " Parsa "],
            ['province' => '2', 'district' => " Rautahat "],
            ['province' => '2', 'district' => "Saptari"],
            ['province' => '2', 'district' => "Sarlahi"],
            ['province' => '2', 'district' => "Siraha"],


            ['province' => '3', 'district' => "Bhaktapur"],
            ['province' => '3', 'district' => "Chitwan"],
            ['province' => '3', 'district' => "Dhading"],
            ['province' => '3', 'district' => "Dolakha"],
            ['province' => '3', 'district' => " Kathmandu "],
            ['province' => '3', 'district' => " Kaverepalanchok "],
            ['province' => '3', 'district' => " Lalitpur "],
            ['province' => '3', 'district' => "Makwanpur"],
            ['province' => '3', 'district' => "Nuwakot"],
            ['province' => '3', 'district' => "Ramechhap"],
            ['province' => '3', 'district' => "Rasuwa"],
            ['province' => '3', 'district' => " Sindhuli "],
            ['province' => '3', 'district' => "Sindupalchok"],


            ['province' => '4', 'district' => "Baglung"],
            ['province' => '4', 'district' => "Gorkha"],
            ['province' => '4', 'district' => "kaski"],
            ['province' => '4', 'district' => "Lamjung"],
            ['province' => '4', 'district' => "Manang"],
            ['province' => '4', 'district' => "Mustang"],
            ['province' => '4', 'district' => "Myagdi"],
            ['province' => '4', 'district' => "Nawalparasi East"],
            ['province' => '4', 'district' => "Parbat "],
            ['province' => '4', 'district' => "Syangja"],
            ['province' => '4', 'district' => "Tanahu"],

            ['province' => '5', 'district' => "Arghakhanchi "],
            ['province' => '5', 'district' => "Banke"],
            ['province' => '5', 'district' => "Bardiya"],
            ['province' => '5', 'district' => "Dang"],
            ['province' => '5', 'district' => "Gulmi"],
            ['province' => '5', 'district' => "Kapilbastu"],
            ['province' => '5', 'district' => "Nawalparasi West"],
            ['province' => '5', 'district' => "Palpa"],
            ['province' => '5', 'district' => "Pyuthan"],
            ['province' => '5', 'district' => "Rolpa"],
            ['province' => '5', 'district' => "Rukum East"],
            ['province' => '5', 'district' => "Rupandehi"],


            ['province' => '6', 'district' => "Dailekh"],
            ['province' => '6', 'district' => "Dolpa"],
            ['province' => '6', 'district' => "Humla"],
            ['province' => '6', 'district' => "Jajarkot"],
            ['province' => '6', 'district' => "Jumla"],
            ['province' => '6', 'district' => "Kalikot"],
            ['province' => '6', 'district' => "Mugu"],
            ['province' => '6', 'district' => "Rukum West"],
            ['province' => '6', 'district' => "Salyan"],
            ['province' => '6', 'district' => "Surkhet"],


            ['province' => '7', 'district' => "Achham"],
            ['province' => '7', 'district' => "Baitadi"],
            ['province' => '7', 'district' => "Bajhang"],
            ['province' => '7', 'district' => "Bajura "],
            ['province' => '7', 'district' => "Dadeldhura  "],
            ['province' => '7', 'district' => "Darchula"],
            ['province' => '7', 'district' => "Doti"],
            ['province' => '7', 'district' => "Kailali"],
            ['province' => '7', 'district' => "Kanchanpur"],

        ];


        District::insert($data); 
    }
}

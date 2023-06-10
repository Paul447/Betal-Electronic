<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['brand_name' => 'Havit',    'brand_discription' => "Havit, a high-tech enterprise. We are audio experts and innovators of smart devices for entertainment, travel and sports. his innovation is being led by our 2 key brands: Havit, Hakii ", 'url' => "https://www.havit.hk/", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Logitech', 'brand_discription' => "A Swiss company focused on innovation and quality, Logitech designs products and experiences that have an everyday place in people's lives", 'url' => "https://www.logitech.com/en-us", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Dell',     'brand_discription' => "We are a diverse team with unique perspectives. United in our purpose, our strategy and our culture. Driven by our ambition and the power of technology to drive human progress. Unwavering in our commitment to equality, trust and advocacy for one another.", 'url' => "dell.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Fantech',  'brand_discription' => "Fantech is one of the world’s fastest growing gear brands for gamers", 'url' => "https://fantechworld.com/", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Rapoo',    'brand_discription' => "Founded in 2002, this wireless pioneer made a long-term commitment to developing and producing innovative and high-quality wireless peripherals. In 2005 the brand Rapoo was established.", 'url' => "https://www.rapoo-eu.com/", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Lenovo',   'brand_discription' => "Lenovo’s story has always been about shaping computing intelligence to create a better world. ", 'url' => "lenovo.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'PNY',      'brand_discription' => "PNY Technologies, Inc., doing business as PNY, is an American manufacturer of flash memory cards, USB flash drives, solid state drives, memory upgrade modules, portable battery chargers, computer locks, cables, chargers, adapters, and consumer and professional graphics cards.", 'url' => "pny.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'MSI',      'brand_discription' => "Micro-Star International Co., Ltd is a Taiwanese multinational information technology corporation headquartered in New Taipei City, Taiwan", 'url' => "msi.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'ASUS',     'brand_discription' => "ASUSTek Computer Inc. is a Taiwanese multinational computer and phone hardware and electronics company headquartered in Beitou District, Taipei, Taiwan", 'url' => "asus.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'OCPC',     'brand_discription' => "OCPC GAMING USA, Inc. (U.S. Based Company) - Which start providing Memory & Storage Solution since 2007. OCPC™ is a USA brand bringing innovative, high-performance components to the PC gaming market. Specializing in very high performance Memory modules, SSD, Graphics Cards, and Gaming accessories, our products are the choice of overclockers, enthusiasts, and gamers everywhere.", 'url' => "ocpcgaming.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'GALAX',    'brand_discription' => "Founded in Hong Kong in 1994 formerly known as Galaxytech, GALAX has been fully committed to bringing the most innovative computer hardware to the growing worldwide market.", 'url' => "galax.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'HP',       'brand_discription' => "We are a technology company born of the belief that companies should do more than just make a profit. They should make the world a better place.Our efforts in climate action, human rights, and digital equity prove that we are doing everything in our power to make it so.", 'url' => "hp.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Apple',    'brand_discription' => "Apple Inc. is an American multinational technology company headquartered in Cupertino, California, United States", 'url' => "apple.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Intel',    'brand_discription' => "Intel Corporation is an American multinational corporation and technology company headquartered in Santa Clara, California. It is the world's largest semiconductor chip manufacturer by revenue, and is one of the developers of the x86 series of instruction sets, the instruction sets found in most personal computers", 'url' => "intel.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'AMD',      'brand_discription' => "The AMD journey began with dozens of employees focused on leading-edge semiconductor products. From those modest beginnings,", 'url' => "amd.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Esonic',   'brand_discription' => "We are a reliable partner of our customers, employees, and suppliers. Together, we create stable solutions with high added value and a vision for future development taking into account the changing needs and business environment of our customer", 'url' => "esonic.cz", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],
            ['brand_name' => 'Gigabyte', 'brand_discription' => "GIGABYTE offers a comprehensive product lineup that aims to “Upgrade Your Life.” With expertise encompassing consumer, business, gaming, and cloud systems, GIGABYTE established its reputation as a leader in the industry with award-winning products including motherboards, graphics cards, laptops, mini PCs, monitors, and other PC components and accessories.", 'url' => "gigabyte.com", 'addedby' => '1', 'approvedby' => '1', 'status' => "approved"],


        ];
        Brand::insert($data);
    }
}

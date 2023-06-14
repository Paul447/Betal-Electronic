<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'product_name' => "Havit MS1027 Gaming Mouse",
                'brand' => "1",
                'discription' => "One click to switch the DPI.
                    Four gears of mouse adjustment(1200-1800-2400-3600DPI)
                    Cool breathing light design
                    With forward backward function, mouse function is improved when surfing the Internet.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "4",
                'thumbnail' => "havitmouse.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Logitech M90 Optical USB Mouse",
                'brand' => "2",
                'discription' => "Mouse, Ideal Fr: Desktop | Laptop
                    Lifestyle: Everyday Use
                    Connection Type: Wired
                    Precise Optical Tracking
                    Movement Resolution: 1000 DPI",
                'slug' => 'this-is-slug',
                'lowstockindication' => "6",
                'thumbnail' => "logictechmouse.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Dell Premier Rechargeable Wireless Mouse – MS7421W",
                'brand' => "3",
                'discription' => "Get uninterrupted productivity with a rechargeable mouse that offers up to six months battery life on a full charge.
                    Connect up to three devices and recharge in just two minutes for a full day’s work.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "3",
                'thumbnail' => "dellmouse.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Fantech UX1 Hero Ultimate Macro RGB Gaming Mouse",
                'brand' => "4",
                'discription' => "7 RGB Color Mode
                    8D Macro Function performance
                    Pixart 3389 Sensor
                    IPS 400
                    Acceleration 50G
                    Nylon Braided 100% Copper Cable",
                'slug' => 'this-is-slug',
                'lowstockindication' => "5",
                'thumbnail' => "fantechmouse.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Dell Optical Mouse- MS116",
                'brand' => "3",
                'discription' => "The Dell Optical Mouse  MS116 features optical LED tracking and wired connectivity providing a stellar performance day after day.",

                'slug' => 'this-is-slug',
                'lowstockindication' => "7",
                'thumbnail' => "dell-2mouse.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Logitech K480 Bluetooth Multi Device Keyboard",
                'brand' => "2",
                'discription' => "Logitech K480 is a comfortable and space-saving multi-device keyboard that brings better typing to your laptop tablet  or phone
             With impressive durability and long battery life
             this tightly designed is what everyone needs to multi-task and get more done.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "10",
                'thumbnail' => "logictechkeyboard.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Rapoo Mechanical Gaming Keyboard",
                'brand' => "5",
                'discription' => "Mechanical Switches
            108 Fully Programmable Keys
            Adjustable RGB Backlight System
            Onboard Memory
            Windows XP/Vista/7/8/10, USB port",
                'slug' => 'this-is-slug',
                'lowstockindication' => "5",
                'thumbnail' => "rapookeybard.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Rapoo NK1800 Wired Keyboard",
                'brand' => "5",
                'discription' => "The wired keyboard is well-spaced, with low keys for accurate and fast typing with low sound and better response.
             Durability, led lights make it a sleek design, and the comfortable, faster keyboard for effortless work and to make it fun.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "5",
                'thumbnail' => "Rapookeyboard2.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Logitech Classic Keyboard K100",
                'brand' => "2",
                'discription' => "Compact, space-saving design, Spill-resistant design, Thin profile, Full-size keyboard, PS/2 connection, Windows® 98, Windows® 2000, Windows® ME, Windows® XP, Windows Vista® or Windows® 7",
                'slug' => 'this-is-slug',
                'lowstockindication' => "3",
                'thumbnail' => "logitechkeyboard2.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Lenovo Wired Keyboard K103",
                'brand' => "6",
                'discription' => "Very suitable for office & business.
            Simple & Lightweight design
            Slim & small size, saving desktop space.
            Interface type: USB
            Connection method: Wired
            Cable: 1.8 meters
            Key No: 104
            Key Life: 10 Million times
            Button Press Distance: 2.3mm
            Adaptation System: Windows 2000/XP/VISTA/Win8/win10, etc",
                'slug' => 'this-is-slug',
                'lowstockindication' => "5",
                'thumbnail' => "lenovokeyboard.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "PNY GTX 1660 TI 6GB Dual Fan XLR8 Graphic Card",
                'brand' => "7",
                'discription' => "Best-In-Class Performance

            Best-in-class performance with the advanced graphics capabilities of the award-winning NVIDIA® Turing™ architecture.

            Turing Shaders

            Concurrent execution of floating point and integer operations, adaptive shading technology, and a new unified memory architecture enable awesome performance increases on today's games.

            State-Of-The-Art-Graphics

            State-of-the-art graphics features, including variable rate shading, mesh shading, and multi-view rendering
            ",
                'slug' => 'this-is-slug',
                'lowstockindication' => "5",
                'thumbnail' => "pnygraphic.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "MSI GPU: NVIDIA GTX 1050 Ti",
                'brand' => "8",
                'discription' => "Interface: PCI Express x16 3.0
            Cores: 768 Units
            Core Clocks:
            OC Mode: 1430 MHz / 1316 MHz
            Gaming Mode: 1417 MHz / 1303 MHz
            Silent Mode: 1392 MHz / 1290 MHz
            Memory Speed: 7008 MHz
            Memory: 4GB GDDR5
            Memory Bus: 128-bit
            Output: 1x DisplayPort v1.4a, 1x HDMI 2.0b (4K @ 60Hz), 1x DL-DVI-D
            Power: 75W
            Power Connector: 1x 6-pin
            Recommended PSU: 300W",
                'slug' => 'this-is-slug',
                'lowstockindication' => "21",
                'thumbnail' => "msigraphic.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "ASUS Dual GeForce RTX 3060 12GB V2 Graphics Card",
                'brand' => "9",
                'discription' => "12GB 192-Bit GDDR6
            Boost Clock OC Mode: 1867 MHz
            Gaming Mode: 1837 MHz
            1 x HDMI 2.1 3 x DisplayPort 1.4a
            3584 CUDA Cores
            PCI Express 4.0",
                'slug' => 'this-is-slug',
                'lowstockindication' => "numericalvalue",
                'thumbnail' => "asusgraphic.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "OCPC RTX 3070 8GB DDR6 Graphics card",
                'brand' => "10",
                'discription' => "NVIDIA CUDA® Cores: 5888
            Memory Configuration: 8GB GDDR6
            Memory Speed: Gbps
            Memory Interface: 256-bit
            Width: 2-Slot
            Cooling Design: Dual Cooling Fan (LED)
            Display Output: 3 x DisplayPort, HDMI",
                'slug' => 'this-is-slug',
                'lowstockindication' => "31",
                'thumbnail' => "ocpcgraphic.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name'  => "GALAX GeForce RTX 4080 16GB GDDR6X SG 1-Click OC Graphics Card",
                'brand' => "11",
                'discription' => "NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2x performance and power efficiency
            4th Generation Tensor Cores: Up to 2X AI performance
            3rd Generation RT Cores: Up to 2X ray tracing performance
            Microsoft DirectX® 12 Ultimate
            GDDR6X Graphics Memory
            NVIDIA DLSS
            NVIDIA® GeForce Experience™
            NVIDIA G-SYNC®
            NVIDIA GPU Boost™
            Game Ready Drivers
            Vulkan RT API, OpenGL 4.6
            DisplayPort 1.4a, HDMI 2.1
            HDCP 2.3
            VR Ready",
                'slug' => 'this-is-slug',
                'lowstockindication' => "5",
                'thumbnail' => "galaxgraphic.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Intel® Core™ X-Series CPU",
                'brand' => "14",
                'discription' => "Designed with the needs of content creators in mind, Intel® Core™ X-series processor family offer the power, and convenience of a full studio in your PC. Quickly and simultaneously record, edit, and render with up to 4.8 GHz achieved through Intel® Turbo Boost Max Technology 3.01, up to 18 cores, and up to 36 threads. Add to this the flexibility offered by up to 72 platform PCIe* 3.0 lanes, quad channel memory with up to 256GB of memory capacity, and support for Thunderbolt™ 3 technology.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "32",
                'thumbnail' => "xcpu2.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Intel® Core™ i9 Processors",
                'brand' => "14",
                'discription' => "13th Gen Intel® Core™ processors advances performance hybrid architecture1 with up to eight Performance-cores (P-core) and up to 16 Efficient-cores (E-core), combined with workloads intelligently routed by Intel® Thread Director2.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "22",
                'thumbnail' => "i9cpu.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "AMD EPYC™ Embedded 7001 Series",
                'brand' => "15",
                'discription' => "The AMD EPYC™ Embedded 7001 processor family adds extended availability* to the flexibility, performance, and security capabilities of the 7001 family.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "32",
                'thumbnail' => "amdcpu.webp",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "AMD Ryzen™ Embedded Family",
                'brand' => "15",
                'discription' => "Ryzen (pronounced RYE zen) is an AMD CPU aimed at the server, desktop, workstation, media center PC and all-in-one markets. AMD's Ryzen base models feature eight cores and 16-thread processing at 3.4Ghz with 20MB cache, neural net-based prediction hardware and smart prefetch.",
                'slug' => 'this-is-slug',
                'lowstockindication' => "11",
                'thumbnail' => "ryzen.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "AMD Embedded R-Series",
                'brand' => "15",
                'discription' => "Processor Family designed to efficiently handle advanced multimedia and computational workloads with high-performance cores",
                'slug' => 'this-is-slug',
                'lowstockindication' => "11",
                'thumbnail' => "amdr2.png",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "Fantech AERO XL CG81 Full Tower Case",
                'brand' => "4",
                'discription' => "FAN 12 CM 12X
            MAGNETIC HINGE SIDE TEMPERED GLASS
            CPU HEIGHT MAX 165mm
            HDD 3X
            SSD 2X
            USB: 2.01 1X | 3.0 1X
            TYPE-C x1
            Include Free 4pcs FRGB Fan",
                'slug' => 'this-is-slug',
                'lowstockindication' => "32",
                'thumbnail' => "case1.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "FANTECH PULSE CG71 RGB MIDDLE TOWER CASE",
                'brand' => "4",
                'discription' => "15 RGB Spectrum Mode
            Supports up to 8 RGB fans
            Extreme heat transfer and light
            Case Cable
            Tempered Glass
            280mm VGA Card Length
            1 3.0 USB, 2 2.0 USB Front Port
            165 mm CPU Height
            2*SSD, 2*HDD Internal Driver Bays",
                'slug' => 'this-is-slug',
                'lowstockindication' => "22",
                'thumbnail' => "case2.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

            [
                'product_name' => "MSI MAG VAMPIRIC 011C Mid Tower Gaming Computer Case",
                'brand' => "15",
                'discription' => "bout this item
            4mm tinted tempered glass side panel, making it ideal for showcasing your build with (RGB) lighting
            Packed with an addressable 120mm RGB fan which supports MSI Mystic Light for unlimited customization options
            The case of magnetic dust filter on top side is designed to give users the best experience in un-installing and cleaning
            Room for up to Six system cooling fans, or a 240 mm radiator in the top, and a 360 mm radiator in the front
            MAG VAMPIRIC 011C chassis can support ATX, mATX and Mini-ITX motherboard
            The MAG VAMPIRIC 011C supports GPUs up to 350mm long and CPU coolers up to 167mm high",
                'slug' => 'this-is-slug',
                'lowstockindication' => "22",
                'thumbnail' => "case3.jpg",
                'addedby' => '1', 'approvedby' => '1', 'status' => "approved"
            ],

        ];
        Product::insert($data);
    }
}

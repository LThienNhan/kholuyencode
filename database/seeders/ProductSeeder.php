<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'brand_id'      =>  '1',
            'sku'           =>  'R1 2014',
            'name'          =>  'R1 2014',
            'slug'          =>  'r1-2014',
            'description'   =>  'r1 2014 is a great product from the manufacturer Yamaha with the best construction and great looks',
            'quantity'      => 202,
            'weight'        => 159,
            'price'         => 19000,
            'sale_price'    => 17990,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '1',
            'sku'           =>  'R1 2022',
            'name'          =>  'R1 2022',
            'slug'          =>  'r1-2022',
            'description'   =>  'r1 2022 is a great product from the manufacturer Yamaha with the best construction and great looks',
            'quantity'      => 232,
            'weight'        => 189,
            'price'         => 24500,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '2',
            'sku'           =>  'Kawasaki Ninja H2R',
            'name'          =>  'Kawasaki Ninja H2R',
            'slug'          =>  'ninja-h2r',
            'description'   =>  'Kawasaki Ninja H2R is a great product from the manufacturer Kawasaki Ninja with the best construction and great looks',
            'quantity'      => 132,
            'weight'        => 209,
            'price'         => 44500,
            'sale_price'    => 40870,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '2',
            'sku'           =>  'Ninja ZX-10R',
            'name'          =>  'Ninja ZX-10R',
            'slug'          =>  'ninja-zx-10r',
            'description'   =>  'Ninja ZX-10R is a great product from the manufacturer Kawasaki Ninja with the best construction and great looks',
            'quantity'      => 191,
            'weight'        => 178,
            'price'         => 30500,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '3',
            'sku'           =>  'Ducati Banigale V4',
            'name'          =>  'Ducati Banigale V4',
            'slug'          =>  'ducati-banigale-v4',
            'description'   =>  'Ducati Banigale V4 is a great product from the manufacturer Ducati with the best construction and great looks',
            'quantity'      => 164,
            'weight'        => 167,
            'price'         => 29000,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '4',
            'sku'           =>  'Lamborghini Veneo 2018',
            'name'          =>  'Lamborghini Veneo 2018',
            'slug'          =>  'lamborghini-veneo-2018',
            'description'   =>  'Lamborghini Veneo 2018 is a great product from the manufacturer Lamborghini with the best construction and great looks',
            'quantity'      => 74,
            'weight'        => 1490,
            'price'         => 980000,
            'sale_price'    => 900000,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '5',
            'sku'           =>  'BMW1000RR',
            'name'          =>  'BMW1000RR',
            'slug'          =>  'bmw1000RR',
            'description'   =>  'BMW1000RR is a great product from the manufacturer BMW with the best construction and great looks',
            'quantity'      => 110,
            'weight'        => 179,
            'price'         => 40890,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '6',
            'sku'           =>  'CBR600RR',
            'name'          =>  'CBR600RR',
            'slug'          =>  'cbr600rr',
            'description'   =>  'CBR600RR is a great product from the manufacturer Honda with the best construction and great looks',
            'quantity'      => 244,
            'weight'        => 180,
            'price'         => 35800,
            'sale_price'    => 30000,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '6',
            'sku'           =>  'CBR1000RR',
            'name'          =>  'CBR1000RR',
            'slug'          =>  'cbr1000rr',
            'description'   =>  'CBR1000RR is a great product from the manufacturer Honda with the best construction and great looks',
            'quantity'      => 104,
            'weight'        => 180,
            'price'         => 40100,
            'sale_price'    => 39200,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '7',
            'sku'           =>  'GSX1000RR',
            'name'          =>  'GSX1000RR',
            'slug'          =>  'gsx1000rr',
            'description'   =>  'GSX1000RR is a great product from the manufacturer Suzuki with the best construction and great looks',
            'quantity'      => 74,
            'weight'        => 182,
            'price'         => 32000,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '8',
            'sku'           =>  'Hongqi S9 Phev',
            'name'          =>  'Hongqi S9 Phev',
            'slug'          =>  'hongqi-s9-phev',
            'description'   =>  'Hongqi S9 Phev is a great product from the manufacturer Hongqi with the best construction and great looks',
            'quantity'      => 51,
            'weight'        => 1390,
            'price'         => 920000,
            'sale_price'    => 892000,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '8',
            'sku'           =>  'Hongqi S9 Red',
            'name'          =>  'Hongqi S9 Red',
            'slug'          =>  'hongqi-s9-red',
            'description'   =>  'Hongqi S9 Red is a great product from the manufacturer Hongqi with the best construction and great looks',
            'quantity'      => 67,
            'weight'        => 1390,
            'price'         => 900000,
            'status'        => 1,
            'featured'      => 1
        ]);
        Product::create([
            'brand_id'      =>  '9',
            'sku'           =>  'Mclaren 720s',
            'name'          =>  'Mclaren 720s',
            'slug'          =>  'mclaren-720s',
            'description'   =>  'Mclaren 720s is a great product from the manufacturer Mclaren with the best construction and great looks',
            'quantity'      => 99,
            'weight'        => 1300,
            'price'         => 850000,
            'status'        => 1,
            'featured'      => 1
        ]);
    }
}

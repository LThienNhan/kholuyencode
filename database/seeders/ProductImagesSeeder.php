<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::create([
            'product_id'    =>  '1',
            'full'          =>  'products/1641958613_r1 2014.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '2',
            'full'          =>  'products/1641958370_r1 2020.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '3',
            'full'          =>  'products/1641958443_2015-kawasaki-ninja-h2r-galler-4057-8124-1415952672.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '4',
            'full'          =>  'products/NINJA ZX-10R ABS.png',
        ]);
        ProductImage::create([
            'product_id'    =>  '5',
            'full'          =>  'products/1641958967_ducati banigale v4.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '6',
            'full'          =>  'products/1641958850_dau-xe-lamborghini-veneno.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '7',
            'full'          =>  'products/BMW-S1000RR-M-20-02.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '8',
            'full'          =>  'products/cbr600rr 2020.jfif',
        ]);
        ProductImage::create([
            'product_id'    =>  '9',
            'full'          =>  'products/cbr1000rr 2020.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '10',
            'full'          =>  'products/GSX 1000RR.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '11',
            'full'          =>  'products/Hongqi s9 phev.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '12',
            'full'          =>  'products/hongqi-s9-lead-image.jpg',
        ]);
        ProductImage::create([
            'product_id'    =>  '13',
            'full'          =>  'products/mclaren-720s-gia.jpg',
        ]);
    }
}

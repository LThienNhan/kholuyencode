<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::create([
            'quantity'      =>  202,
            'price'       =>  19000,
            'product_id'   =>  1,
        ]);
        ProductAttribute::create([
            'quantity'      =>  232,
            'price'       =>  24500,
            'product_id'   =>  2,
        ]);
        ProductAttribute::create([
            'quantity'      =>  132,
            'price'       =>  44500,
            'product_id'   =>  3,
        ]);
        ProductAttribute::create([
            'quantity'      =>  191,
            'price'       =>  30500,
            'product_id'   =>  4,
        ]);
        ProductAttribute::create([
            'quantity'      =>  164,
            'price'       =>  29000,
            'product_id'   =>  5,
        ]);
        ProductAttribute::create([
            'quantity'      =>  74,
            'price'       =>  950000,
            'product_id'   =>  6,
        ]);
        ProductAttribute::create([
            'quantity'      =>  110,
            'price'       =>  40890,
            'product_id'   =>  7,
        ]);
        ProductAttribute::create([
            'quantity'      =>  244,
            'price'       =>  35800,
            'product_id'   =>  8,
        ]);
        ProductAttribute::create([
            'quantity'      =>  104,
            'price'       =>  40100,
            'product_id'   =>  9,
        ]);
        ProductAttribute::create([
            'quantity'      =>  74,
            'price'       =>  32000,
            'product_id'   =>  10,
        ]);
        ProductAttribute::create([
            'quantity'      =>  51,
            'price'       =>  920000,
            'product_id'   =>  11,
        ]);
        ProductAttribute::create([
            'quantity'      =>  67,
            'price'       =>  900000,
            'product_id'   =>  12,
        ]);
        ProductAttribute::create([
            'quantity'      =>  99,
            'price'       =>  850000,
            'product_id'   =>  13,
        ]);
    }
}

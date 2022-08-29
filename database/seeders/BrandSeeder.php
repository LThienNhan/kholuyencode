<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name'          =>  'yamaha',
            'slug'          =>  'yamaha',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Ninja',
            'slug'          =>  'ninja',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Ducati',
            'slug'          =>  'ducati',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Lamborghini',
            'slug'          =>  'lamborghini',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'BWM',
            'slug'          =>  'bmw',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Honda',
            'slug'          =>  'honda',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Suzuki',
            'slug'          =>  'suzuki',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Hongqi',
            'slug'          =>  'hongqi',
            'logo'          =>  '',
        ]);
        Brand::create([
            'name'          =>  'Mclaren',
            'slug'          =>  'mclaren',
            'logo'          =>  '',
        ]);

    }
}

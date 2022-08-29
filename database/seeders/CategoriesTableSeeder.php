<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Root',
            'description'   =>  'This is the root category, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);
        Category::create([
            'name'          =>  'Product Moto',
            'slug'          =>  'moto',
            'description'   =>  'this is page moto',
            'parent_id'     =>  '1',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Yamaha',
            'slug'          =>  'yamaha',
            'description'   =>  'this is page Yamaha',
            'parent_id'     =>  '2',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Ninja',
            'slug'          =>  'ninja',
            'description'   =>  'this is page Ninja',
            'parent_id'     =>  '2',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Ducati',
            'slug'          =>  'ducati',
            'description'   =>  'this is page Ducati',
            'parent_id'     =>  '2',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Lamborghini',
            'slug'          =>  'lamborghini',
            'description'   =>  'this is page Lamborghini',
            'parent_id'     =>  '1',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'BMW',
            'slug'          =>  'bmw',
            'description'   =>  'this is page BMW',
            'parent_id'     =>  '2',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Honda',
            'slug'          =>  'honda',
            'description'   =>  'this is page Honda',
            'parent_id'     =>  '2',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Suzuki',
            'slug'          =>  'suzuki',
            'description'   =>  'this is page Suzuki',
            'parent_id'     =>  '2',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Hongqi',
            'slug'          =>  'hongqi',
            'description'   =>  'this is page Hongqi',
            'parent_id'     =>  '1',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
        Category::create([
            'name'          =>  'Mclaren',
            'slug'          =>  'mclaren',
            'description'   =>  'this is page Mclaren',
            'parent_id'     =>  '1',
            'featured'     =>  0,
            'menu'          =>  1,
        ]);
    }
}

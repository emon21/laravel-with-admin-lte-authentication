<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoies = [
           [
            'id' => '1',
            'categories_name' => 'Laravel',

           ],
           [
            'id' => '2',
            'categories_name' => 'Php',

           ],
           [
            'id' => '3',
            'categories_name' => 'Java',

           ],
           [
            'id' => '4',
            'categories_name' => 'Java Script',

           ],
           [
            'id' => '5',
            'categories_name' => 'Python',

           ]
        ];

        Category::insert($categoies);
       // Category::factory(10)->create();

    }
}

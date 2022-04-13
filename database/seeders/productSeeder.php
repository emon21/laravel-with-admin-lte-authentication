<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use Database\Factories\ProductFactory;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $title = "title this product";
        $product = [
            [
                'id' => '1',
                'title' => $title,
                'slug' => Str::slug($title),
                'image' => 'product/default.jpg',
                'price' => '1200',
                'stock' => '120',
                'total' => '120',
                'status' => '1',
            ]
        ];

        Product::insert($product);
        //Product::factory(10)->create();
    }
}

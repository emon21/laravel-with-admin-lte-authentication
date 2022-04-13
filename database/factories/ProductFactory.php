<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
class ProductFactory extends Factory
{


    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */



    public function definition()
    {

      //  $title = $this->faker->unique()->title;
        $title = $this->faker->title;
        $price = rand(10,500);
        $stock = rand(1,10);
        $gtotal = $price * $stock;
        $slug = Str::slug($title);
        return [
            //product

            'title' =>$title,
            'slug' =>$slug,
            'image' =>'product/default.jpg',
            'price' => $price,
            'stock' =>$stock,
            'total' =>$gtotal,
            'status' =>$this->faker->numberBetween(0,1),
        ];

    }
}

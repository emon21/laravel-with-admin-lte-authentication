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

        $title = $this->faker->title(50);
        $price = rand(10,500);
        $stock = rand(1,10);
        $gtotal = $price * $stock;
        $slug = Str::slug($title);
        return [
            //product
            'title' =>$title,
            'slug' =>$slug,
            'image' =>$this->faker->name(10),
            'price' => $price,
            'stock' =>$stock,
            'total' =>$gtotal,
            'status' =>$this->faker->numberBetween(0,1),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class CategoryFactory extends Factory
{

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categories_name' => $this->faker->title(150),
        ];


        // $categories = ['Hardware', 'Software', 'Planning', 'Tools'];

        // foreach ($categories as $categoryName) {
        //     factory(Category::class)->create([
        //         'name' => $categoryName,
        //         'slug' => Str::slug($categoryName),
        //     ]);

        // }

        // $factory->define(Category::class, function (Faker $faker){

        //     return [
        //         'name' =>$faker->name,
        //         'slug' =>  Str::slug($faker->text(12))
        //     ];
        // });
    }
}

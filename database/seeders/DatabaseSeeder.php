<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\factory;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
        UserSeeder::class,
        StudentSeeder::class,
        CategorySeeder::class,
        ]);
        \App\Models\Product::factory(20)->create();
       // \App\Models\Category::factory()->count(10)->create();


    }
}

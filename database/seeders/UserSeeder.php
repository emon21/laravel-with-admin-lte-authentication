<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Emon Raj';
        $user->email = 'emon@mail.com';
        $user->password = bcrypt('12345678');
        $user->user_picture = 'default.jpg';
        $user->role_id = '1';
        $user->save();
        // $user = [
        //     [
        //         'id' => '1',
        //         'name' => 'Emon Raj',
        //         'email' => 'emon@mail.com',
        //         'user_picture' => 'default.jpg',
        //         'role_id' => '1',
        //         'password' => Str::,
        //         'status' => '1',
        //     ]

        // ];
        // User::insert($user);
    }
}

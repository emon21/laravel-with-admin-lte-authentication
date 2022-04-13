<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = [
            [
                'id' => '1',
                'student_name' => 'Emon',
                'email' => 'emon@mail.com',
                'designation' => 'Programmer',
                'phone' => '112233344556678',
                'std_picture' => '',
                'gender' => '1',
                'status' => '0',
            ],
            [
                'id' => '2',
                'student_name' => 'Kholil',
                'email' => 'kholil@mail.com',
                'designation' => 'Programmer',
                'phone' => '112233344556678',
                'std_picture' => '',
                'gender' => '1',
                'status' => '0',
            ],
            [
                'id' => '3',
                'student_name' => 'Abir',
                'email' => 'abir@mail.com',
                'designation' => 'Programmer',
                'phone' => '112233344556678',
                'std_picture' => '',
                'gender' => '1',
                'status' => '0',
            ]

        ];
        Student::insert($student);
    }
}

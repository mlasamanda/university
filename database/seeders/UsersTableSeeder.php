<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fname' => 'admin',
                'mname' => 'admin',
                'lname' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'roleid'=>1,
//                'programmeid'=>1,
//                'departmentid'=>1,
                'mobileno'=>'0785987184',
                'gender'=>'male',
                'dob'=>'1990-01-01',
                'created_by' =>1,
                'regno'=>'PFA-21-0045'
            ],
            [
                'fname' => 'admin',
                'mname' => 'admin',
                'lname' => 'admin',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'roleid'=>2,
                'created_by' =>1,
                'mobileno'=>'0785987184',
                'gender'=>'male',
                'dob'=>'1990-01-01',
                'regno'=>'PFA-21-0046'
            ],

        ];
        User::insert($users);
    }
}

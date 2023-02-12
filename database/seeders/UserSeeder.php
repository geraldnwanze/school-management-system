<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'role' => User::SUPER_ADMIN,
                'username' => User::SUPER_ADMIN,
                'email' => User::SUPER_ADMIN.'@gmail.com',
                'password' => 123456,
            ],
            [
                'role' => User::ADMIN,
                'username' => User::ADMIN,
                'email' => User::ADMIN.'@gmail.com',
                'password' => 123456,
            ],
            [
                'role' => User::STAFF,
                'username' => 'staff1',
                'email' => 'staff1@gmail.com',
                'password' => 123456,
            ],
            [
                'role' => User::STAFF,
                'username' => 'staff2',
                'email' => 'staff2@gmail.com',
                'password' => 123456,
            ],
            [
                'role' => User::STUDENT,
                'username' => User::STUDENT,
                'email' => User::STUDENT.'@gmail.com',
                'password' => 123456,
            ]
        ];

        for ($i = 0; $i < count($users); $i++) {
            User::create($users[$i]);
        }
    }
}

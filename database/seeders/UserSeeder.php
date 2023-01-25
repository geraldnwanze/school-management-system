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
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'role' => User::ADMIN,
                'username' => User::ADMIN,
                'email' => User::ADMIN.'@gmail.com',
                'password' => 123456,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'role' => User::STAFF,
                'username' => User::STAFF,
                'email' => User::STAFF.'@gmail.com',
                'password' => 123456,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'role' => User::STUDENT,
                'username' => User::STUDENT,
                'email' => User::STUDENT.'@gmail.com',
                'password' => 123456,
                'created_by' => 1,
                'updated_by' => 1,
            ]
        ];

        for ($i = 0; $i < count($users); $i++) {
            User::create($users[$i]);
        }
    }
}

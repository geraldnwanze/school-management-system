<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperAdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role' => User::SUPER_ADMIN,
            'username' => User::SUPER_ADMIN,
            'email' => User::SUPER_ADMIN.'@gmail.com',
            'password' => 123456,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role' => User::ADMIN,
            'username' => User::ADMIN,
            'email' => User::ADMIN.'@gmail.com',
            'password' => 123456,
        ];
    }
}

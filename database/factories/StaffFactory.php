<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role' => User::STAFF,
            'username' => 'staff1',
            'email' => 'staff1@gmail.com',
            'password' => 123456,
        ];
    }
}

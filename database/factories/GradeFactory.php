<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grade' => $this->faker->randomElement(array('A', 'B', 'C', 'D', 'F')),
            'min' => $this->faker->numberBetween('40', '69'),
            'max' => $this->faker->numberBetween('70', '100') 
        ];
    }
}

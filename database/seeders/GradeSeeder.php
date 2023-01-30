<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                'grade' => 'A',
                'min' => 70,
                'max' => 100
            ],
            [
                'grade' => 'B',
                'min' => 60,
                'max' => 69
            ],
            [
                'grade' => 'C',
                'min' => 50,
                'max' => 59
            ],
            [
                'grade' => 'D',
                'min' => 40,
                'max' => 49
            ],
            [
                'grade' => 'F',
                'min' => 0,
                'max' => 39
            ]
            
        ];
         foreach ($grades as $key => $value) {
            Grade::create($value);
         }
    }
}

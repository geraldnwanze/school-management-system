<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Subject::factory()->create();
        $subjects = [
            [
                'name' => 'English'
            ],
            [
                'name' => 'Mathematics'
            ],
            [
                'name' => 'French'
            ],
            [
                'name' => 'Social studies'
            ]
        ];

        foreach ($subjects as $key => $value) {
            Subject::create($value);
        }
    }
}

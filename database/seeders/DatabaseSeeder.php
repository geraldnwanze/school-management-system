<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StateSeeder::class,
            LGASeeder::class,
            ClassRoomSeeder::class,
            SubjectSeeder::class,
            SessionSeeder::class,
            TermSeeder::class,
            GradeSeeder::class,
            StaffSeeder::class,
        ]);
    }
}

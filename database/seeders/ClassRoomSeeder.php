<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'js1',
            ],
            [
                'name' => 'js2',
            ],
            [
                'name' => 'js3',
            ],
            [
                'name' => 'ss1',
            ],
            [
                'name' => 'ss2',
            ],
            [
                'name' => 'ss3',
            ],
        ];
        
        for ($i = 0; $i < count($classes); $i++) {
            ClassRoom::create($classes[$i]);
        }
    }
}

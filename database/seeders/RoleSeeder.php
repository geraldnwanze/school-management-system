<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'SuperAdmin',
                'slug' => 'superadmin',
                'description' => 'system super administrator'
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => 'system admin'
            ],
            [
                'name' => 'Staff',
                'slug' => 'staff',
                'description' => 'school teacher'
            ],
            [
                'name' => 'Student',
                'slug' => 'student',
                'description' => 'student of school'
            ],
           
        ];

        for ($i = 0; $i < count($roles); $i++) {
            Role::create($roles[$i]);
        }
    }
}

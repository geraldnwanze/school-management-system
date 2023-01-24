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
                'description' => 'system super administrator'
            ],
            [
                'name' => 'Admin',
                'description' => 'system admin'
            ],
            [
                'name' => 'Staff',
                'description' => 'school teacher'
            ],
            [
                'name' => 'Student',
                'description' => 'student of school'
            ],
           
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

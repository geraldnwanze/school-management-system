<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
            [
                'user_id' => 3,
                'surname' => 'Joe', 
                'firstname' => 'pharel', 
                'othername' => 'wilson', 
                'email' => 'pharelwilson@gmail.com',
                'gender' => 'male', 
                'phone_number' => +245890044579,
                'nationality' => 'Canadian',
                'state_id' => 4,
                'lga_id' => 47,
            ],
            [
                'user_id' => 4,
                'surname' => 'Adams', 
                'firstname' => 'petra', 
                'othername' => 'jane', 
                'email' => 'petrajane@gmail.com',
                'gender' => 'female', 
                'phone_number' => +245890044579,
                'nationality' => 'Nigerian',
                'state_id' => 4,
                'lga_id' => 73,
            ]
        ];
        foreach($values as $value){
            Staff::create($value);
        }
            
    }
}

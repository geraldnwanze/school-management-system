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
                'surname' => 'Joe', 
                'firstname' => 'pharel', 
                'othername' => 'wilson', 
                'email' => 'pharelwilson@gmail.com',
                'gender' => 'male', 
                'phone_number' => +245890044579,
                'nationality' => 'Canadian',
                'state' => 2,
                'lga' => 4,
            ],
            [
                'surname' => 'Adams', 
                'firstname' => 'petra', 
                'othername' => 'jane', 
                'email' => 'petrajane@gmail.com',
                'gender' => 'Female', 
                'phone_number' => +245890044579,
                'nationality' => 'Nigerian',
                'state' => 2,
                'lga' => 4,
            ]
        ];
        foreach($values as $value){
            Staff::create($value);
        }
            
    }
}

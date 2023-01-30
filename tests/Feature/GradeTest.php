<?php

namespace Tests\Feature;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GradeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_index()
    {
        Grade::factory(5)->create();
        $response = $this->get(route('dashboard.grades.index'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.grade.index');
        $response->assertViewHas('grades');
    }

    public function test_create()
    {
        $response = $this->get(route('dashboard.grades.create'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.grade.create');
    }

    public function test_store()
    {
        // $user =  User::factory()->create()->first();
        $min = 60; $max = 70;
        $response = $this
        // ->actingAs($user)
        ->post(route('dashboard.grades.create', [
            'grade' => 'A',
            'min' => $min,
            'max' => $max,
        ]));
        $this->assertIsNumeric($min, "value is not numeric");
        $this->assertIsNumeric($max, "value is not numeric");
        //test whether max is greater than min
        //assertGreaterThan("expected", "actual value", "error msg if failed")
        $this->assertGreaterThan($min, $max, "Maximum must be greater than minimum score");
        // $response->assertOk(true);
        $response->assertCreated(true);
        $response->assertStatus(302);
        // $response->assertRedirect(route('dashboard.grades.create'));
        
    }

    public function test_edit()
    {
        $grade = Grade::factory()->create();
        $response = $this->get(route('dashboard.grades.edit', $grade->id));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.grade.edit');
        $response->assertViewHas('grade', $grade);
    }

    // public function test_update()
    // {

    // }

}

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
        $min = 60;
        $max = 70;
        $response = $this->post(route('dashboard.grades.create', [
            'grade' => 'A',
            'min' => $min,
            'max' => $max,
        ]));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.grades.index'));
        $this->assertDatabaseHas('grades', [
            'grade' => 'A',
            'min' => $min,
            'max' => $max,
        ]);
        
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

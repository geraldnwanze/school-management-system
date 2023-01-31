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

    public function test_update()
    {
        $min = 60;
        $max = 70;
        $grade = Grade::factory()->create();
        $response = $this->patch(route('dashboard.grades.update', $grade->id), [
            'grade' => 'A',
            'min' => $min,
            'max' => $max,
        ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.grades.index'));
        $this->assertDatabaseHas('grades', [
            'grade' => 'A',
            'min' => $min,
            'max' => $max,
        ]);
    }

    public function test_destroy()
    {
        $grade = Grade::factory()->create();
        $response = $this->delete(route('dashboard.grades.delete', $grade->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.grades.index'));
        $this->assertSoftDeleted('grades', ['id' => $grade->id]);
    }

    public function test_deleted()
    {
        $response = $this->get(route('dashboard.grades.deleted'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.grade.deleted');
        $response->assertViewHas('grades');
    }

    public function test_restore()
    {
        $grade = Grade::factory()->create();
        $grade->delete();
        $response = $this->patch(route('dashboard.grades.restore', $grade->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.grades.index'));
        $this->assertDatabaseHas('grades', ['deleted_at' => null]);
        $this->assertNotSoftDeleted('grades', ['id' => $grade->id]);
    }

    public function test_force_delete()
    {
        $grade = Grade::factory()->create();
        $grade->delete();
        $response = $this->delete(route('dashboard.grades.force-delete', $grade->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.grades.deleted'));
        $this->assertDatabaseMissing('grades', ['id' => $grade->id]);
    }

}

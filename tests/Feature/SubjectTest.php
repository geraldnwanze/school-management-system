<?php

namespace Tests\Feature;

use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    protected $data = ['name' => 'English'];

    public function test_index()
    {
        $response = $this->get(route('dashboard.subjects.index'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.subjects.index');
        $response->assertViewHas('subjects');
    }

    public function test_create()
    {
        $response = $this->get(route('dashboard.subjects.create'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.subjects.create');
    }

    public function test_store()
    {
        $response = $this->post(route('dashboard.subjects.store'), $this->data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.subjects.index'));
        $this->assertDatabaseHas('subjects', $this->data);
    }

    public function test_edit()
    {
        $subject = Subject::factory()->create();
        $response = $this->get(route('dashboard.subjects.edit', $subject->id));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.subjects.edit');
        $response->assertViewHas('subject', $subject);
    }

    public function test_update()
    {
        $subject = Subject::factory()->create();
        $response = $this->patch(route('dashboard.subjects.update', $subject->id), $this->data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.subjects.index'));
        $this->assertDatabaseHas('subjects', $this->data);
    }

    public function test_toggle_status()
    {
        $subject = Subject::factory()->create();
        $response = $this->patch(route('dashboard.subjects.toggle-status', $subject->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.subjects.index'));
    }

    public function test_destroy()
    {
        $subject = Subject::factory()->create();
        $response = $this->delete(route('dashboard.subjects.delete', $subject->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.subjects.index'));
        $this->assertSoftDeleted('subjects', ['id' => $subject->id]);
    }

    public function test_deleted()
    {
        $response = $this->get(route('dashboard.subjects.deleted'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.subjects.deleted');
        $response->assertViewHas('subjects');
    }

    public function test_restore()
    {
        $subject = Subject::factory()->create();
        $subject->delete();
        $response = $this->patch(route('dashboard.subjects.restore', $subject->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.subjects.index'));
        $this->assertDatabaseHas('subjects', ['deleted_at' => null]);
        $this->assertNotSoftDeleted('subjects', ['id' => $subject->id]);
    }

    public function test_force_delete()
    {
        $subject = Subject::factory()->create();
        $subject->delete();
        $response = $this->delete(route('dashboard.subjects.force-delete', $subject->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.subjects.deleted'));
        $this->assertDatabaseMissing('subjects', ['id' => $subject->id]);
    }
}

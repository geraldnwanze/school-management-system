<?php

namespace Tests\Feature;

use App\Models\ClassRoom;
use Tests\TestCase;

class ClassRoomTest extends TestCase
{   
    protected $data = ['name' => 'jss 1'];

    public function test_index()
    {
        $response = $this->get(route('dashboard.classes.index'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.class.index');
        $response->assertViewHas('classes');
    }

    public function test_create()
    {
        $response = $this->get(route('dashboard.classes.create'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.class.create');
    }

    public function test_store()
    {
        $response = $this->post(route('dashboard.classes.store'), $this->data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.classes.index'));
        $this->assertDatabaseHas('class_rooms', $this->data);
    }

    public function test_edit()
    {
        $class = ClassRoom::factory()->create();
        $response = $this->get(route('dashboard.classes.edit', $class->id));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.class.edit');
        $response->assertViewHas('class', $class);
    }

    public function test_update()
    {
        $class = ClassRoom::factory()->create();
        $response = $this->patch(route('dashboard.classes.update', $class->id), $this->data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.classes.index'));
        $this->assertDatabaseHas('class_rooms', $this->data);
    }
    
    public function test_toggle_status()
    {
        $class = ClassRoom::factory()->create();
        $response = $this->patch(route('dashboard.classes.toggle-status', $class->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.classes.index'));
    }

    public function test_destroy()
    {
        $class = ClassRoom::factory()->create();
        $response = $this->delete(route('dashboard.classes.delete', $class->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.classes.index'));
        $this->assertSoftDeleted('class_rooms', ['id' => $class->id]);
    }
}

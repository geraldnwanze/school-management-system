<?php

namespace Tests\Feature;

use App\Models\Session;
use Tests\TestCase;

class SessionTest extends TestCase
{
    protected $store = ['from' => '2022', 'to' => '2023'];
    protected $update = ['from' => '2025', 'to' => '2026'];

    public function test_index()
    {
        $response = $this->get(route('dashboard.sessions.index'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.sessions.index');
        $response->assertViewHas('sessions');
    }

    public function test_create()
    {
        $response = $this->get(route('dashboard.sessions.create'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.sessions.create');
    }

    public function test_store()
    {
        $response = $this->post(route('dashboard.sessions.store'), $this->store);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.sessions.index'));
        $this->assertDatabaseHas('sessions', $this->store);
    }

    public function test_edit()
    {
        $session = Session::factory()->create();
        $response = $this->get(route('dashboard.sessions.edit', $session->id));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.sessions.edit');
        $response->assertViewHas('session', $session);
    }

    public function test_update()
    {
        $session = Session::factory()->create();
        $response = $this->patch(route('dashboard.sessions.update', $session->id), $this->update);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.sessions.index'));
        $this->assertDatabaseHas('sessions', $this->update);
    }

    public function test_toggle_status()
    {
        $session = Session::factory()->create();
        $response = $this->patch(route('dashboard.sessions.toggle-status', $session->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.sessions.index'));
    }

    public function test_destroy()
    {
        $session = Session::factory()->create();
        $response = $this->delete(route('dashboard.sessions.delete', $session->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.sessions.index'));
        $this->assertSoftDeleted('sessions', ['id' => $session->id]);
    }
}

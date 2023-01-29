<?php

namespace Tests\Feature;

use App\Models\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TermTest extends TestCase
{
    protected $data = ['name' => 'First Term'];

    public function test_index()
    {
        $terms = Term::factory()->create();
        $response = $this->get(route('dashboard.terms.index'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.terms.index');
        $response->assertViewHas('terms');
    }

    public function test_create()
    {
        $response = $this->get(route('dashboard.terms.create'));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.terms.create');
    }

    public function test_store()
    {
        $response = $this->post(route('dashboard.terms.store'), $this->data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.terms.index'));
        $this->assertDatabaseHas('terms', $this->data);
    }

    public function test_edit()
    {
        $term = Term::factory()->create();
        $response = $this->get(route('dashboard.terms.edit', $term->id));
        $response->assertStatus(200);
        $response->assertViewIs('dashboard.terms.edit');
        $response->assertViewHas('term', $term);
    }

    public function test_update()
    {
        $term = Term::factory()->create();
        $response = $this->patch(route('dashboard.terms.update', $term->id), $this->data);
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.terms.index'));
        $this->assertDatabaseHas('terms', $this->data);
    }

    public function test_toggle_status()
    {
        $term = Term::factory()->create();
        $response = $this->patch(route('dashboard.terms.toggle-status', $term->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.terms.index'));
    }

    public function test_destroy()
    {
        $term = Term::factory()->create();
        $response = $this->delete(route('dashboard.terms.delete', $term->id));
        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard.terms.index'));
        $this->assertSoftDeleted('terms', ['id' => $term->id]);
    }
}

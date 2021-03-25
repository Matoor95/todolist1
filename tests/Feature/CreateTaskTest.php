<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     *
     */
    use RefreshDatabase;
    public function test_auth_can_create_task()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->post('/tasks', [
            'title' => 'Ma nouvelle tâche',
            'detail' => 'Tous les détails de ma nouvelle tâche',
        ]);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Ma nouvelle tâche'
        ]);
        $this->get('/')
             ->assertSee('Ma nouvelle tâche');
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateViewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_create_view_for_authenticated_users()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/solicituds/create');

        $response->assertStatus(200);
        $response->assertSee('Solicitar cupo');
    }
}

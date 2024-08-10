<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /** @test */
    public function it_loads_the_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Bienvenidos a Genios del Saber:');
    }
}

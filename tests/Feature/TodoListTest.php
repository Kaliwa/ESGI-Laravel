<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
    public function test_update(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
    public function test_put(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
    public function test_delete(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

}

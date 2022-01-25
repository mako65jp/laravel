<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloIndexPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/hello');

        $response->assertStatus(200);
    }

    public function testBody()
    {
        $response = $this->get('/hello');

        $response->assertSeeText('hello japan!');
    }
}

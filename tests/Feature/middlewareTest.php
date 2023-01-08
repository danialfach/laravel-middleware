<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class middlewareTest extends TestCase
{
    public function testInvalid()
    {
        $this->get('/middleware/api')
            ->assertStatus(401)
            ->assertSeeText("Access Denied");
    }

    public function testvalid()
    {
        $this->withHeader('X-API-KEY', 'DANY')
            ->get('/middleware/api')
            ->assertStatus(200)
            ->assertSeeText('Yoi');
    }
}
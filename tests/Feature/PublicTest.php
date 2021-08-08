<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PublicTest extends TestCase
{

    public function test_is_the_initial_structure_visible()
    {
        $this
            ->get('/')
            ->assertStatus(Response::HTTP_OK)
            ->assertSeeText('Loading')
        ;
    }
}

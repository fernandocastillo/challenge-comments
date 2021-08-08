<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response ;

class ApiCommentsTest extends TestCase
{

    public function test_get_comments_endpoint()
    {
        $this
            ->getJson('/api/comment')
            ->assertStatus(Response::HTTP_OK)
        ;
    }
}

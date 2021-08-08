<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiPostCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_trying_to_post_an_empty_comment()
    {
        $this
            ->post('/api/comment')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ;
    }


}

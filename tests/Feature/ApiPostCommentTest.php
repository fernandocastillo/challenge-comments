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
            ->postJson('/api/comment')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ;
    }

    public function test_trying_to_post_dirty_payload(){

        $payload = [
            'name' =>  'Hi I am a dirty  <|`\' string',
            'comment' => '9393838'
        ];

        $this
            ->postJson('/api/comment', $payload)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ;
    }

    public function test_trying_to_post_clean_payload(){

        $payload = [
            'name' =>  'Hi my name is Fernando',
            'comment' => 'And this is a great c0mm3nt'
        ];

        $this
            ->postJson('/api/comment', $payload)
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'message',
                'comment' =>  [
                    'name',
                    'comment',
                    'created_at'
                ]
            ])
        ;
    }


}

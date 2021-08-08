<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response ;

class ApiCommentsTest extends TestCase
{

    public function test_get_comments()
    {
        $this
            ->getJson('/api/comments')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data'  =>  [
                    '*' => [
                        'user_name',
                        'comment',
                        'created_at'
                    ]
                ]
            ])
        ;
    }
}

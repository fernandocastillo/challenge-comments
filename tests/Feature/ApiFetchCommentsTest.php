<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response ;
use App\Models\Comment;

class ApiFetchCommentsTest extends TestCase
{
    use RefreshDatabase;

    private function createCommentsInDB($quantity=5){
        factory(Comment::class, $quantity)->create();
    }

    public function test_get_comments_endpoint()
    {
        $this
            ->getJson('/api/comment')
            ->assertStatus(Response::HTTP_OK)
        ;
    }

    public function test_comments_json_structure(){

        $this->createCommentsInDB();

        $this
            ->getJson('/api/comment')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data'  =>  [
                    '*' => [
                        'name',
                        'comment',
                        'created_at',
                    ]
                ]
            ])
        ;
    }

    public function test_paginated_results_in_comments(){

        $this->createCommentsInDB(100);
        $this
            ->getJson('/api/comment')
            ->assertJsonCount(5,'data')
        ;

    }
}

<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Traits\CommentTestable;
use App\Models\Comment;

class ApiPostCommentTest extends TestCase
{
    use RefreshDatabase, CommentTestable;

    private function get_clean_payload(){
        return [
            'name' =>  'Hi my name is Fernando, I have a Dog. But not sure if is a valid string.',
            'comment' => 'And this is a great c0mm3nt'
        ];
    }

    private function get_dirty_payload(){
        return [
            'name' =>  'Hi I am a dirty  <|`\' string',
            'comment' => '9393838'
        ];
    }

    public function test_trying_to_post_an_empty_comment()
    {
        $this
            ->postJson('/api/comment')
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ;
    }

    public function test_trying_to_post_dirty_payload(){

        $dirtyPayload = $this->get_dirty_payload();

        $this
            ->postJson('/api/comment', $dirtyPayload)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ;
    }

    public function test_trying_to_post_clean_payload(){

        $cleanPayload = $this->get_clean_payload();

        $this
            ->postJson('/api/comment', $cleanPayload)
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

    public function test_trying_to_post_a_invalid_reply_comment(){

        $cleanPayload = $this->get_clean_payload();
        $cleanPayload['parent_id'] = 'INVALID_ID';

        $this
            ->postJson('/api/comment', $cleanPayload)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
        ;

    }

    public function test_post_a_reply(){

        $this->createCommentsInDB(10);

        $existingComment = Comment::first();
        $cleanPayload = $this->get_clean_payload();
        $cleanPayload['parent_id'] = $existingComment->id;

        $response = $this
            ->postJson('/api/comment', $cleanPayload)
            ->assertStatus(Response::HTTP_OK)
        ;

        $lastRecord = Comment::orderBy('id','desc')->first();
        $response
            ->assertJson([
                'comment'=>[
                    'id' => $lastRecord->id,
                ]
            ])
        ;


        $this->assertNotEquals($lastRecord->id, $existingComment->id);

    }


}

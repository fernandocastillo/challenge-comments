<?php

namespace App\Traits;

use App\Models\Comment;

trait CommentTestable
{
    private function createCommentsInDB($quantity=5){
        factory(Comment::class, $quantity)->create();
    }
}
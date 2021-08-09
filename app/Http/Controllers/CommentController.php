<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function get_comments(Request $request){

        $collection = Comment::parents()
            ->withSortedChildren()
            ->orderBy('created_at','desc')
            ->paginate(5)
        ;

        return CommentResource::collection($collection);
    }


    public function create_comment(CommentRequest $request){

        $payload = [
            'name' => $request->name,
            'comment' => $request->comment,
        ];

        if($request->parent_id){
            $payload['parent_id'] = $request->parent_id;
        }

        $comment = Comment::create($payload);

        return response()
            ->json([
                'message' => 'Comment posted successfully',
                'comment' => new CommentResource($comment)
            ]);
    }
}

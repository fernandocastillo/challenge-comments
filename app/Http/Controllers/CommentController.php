<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function get_comments(Request $request){

        $collection = Comment::parents()->
            orderBy('id','desc')->
            paginate(5);

        return CommentResource::collection($collection);
    }


    public function create_comment(CommentRequest $request){

    }
}

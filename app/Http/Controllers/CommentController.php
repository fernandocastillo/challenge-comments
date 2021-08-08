<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function get_comments(Request $request){
        return response()->json([
            'message'=>'Temporary message'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreRequest $request)
    {
       $comment = $request->validated();
       $comment['user_id'] = auth()->user()->id;
       Comment::create($comment);
       return redirect()->back();
    }
}

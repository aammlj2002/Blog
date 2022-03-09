<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        $formData = request()->validate([
            "body"=>"required",
        ]);
        $blog->comments()->create([
            ...$formData,
            "user_id"=>auth()->id()
        ]);
        return back();
    }
    public function reply(Blog $blog, Comment $comment)
    {
        $formData = request()->validate([
            "body"=>"required"
        ]);

        Comment::create([
            ...$formData,
            "blog_id"=>$blog->id,
            "parent_id"=>$comment->id,
            "user_id"=>auth()->user()->id
        ]);
        return back();
    }
}

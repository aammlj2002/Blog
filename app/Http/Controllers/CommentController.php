<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
}

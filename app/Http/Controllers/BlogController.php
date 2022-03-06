<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
    }
    public function show(Blog $blog)
    {
        return view("blog.show", [
            "blog"=>$blog,
        ]);
    }
    public function create()
    {
        return view("blog.create");
    }
    public function store()
    {
        $formData = request()->validate([
            "title"=>"required",
            "thumbnail"=>"required|image",
            "slug"=>["required", Rule::unique("blogs", "slug")],
            "intro"=>"required",
            "body"=>"required",
            "category_id"=>["required", Rule::exists("categories", "id")],
        ]);
        Blog::create([
            ...$formData,
            "user_id"=>auth()->user()->id,
            "thumbnail"=>request()->file("thumbnail")->store("thumbnails")
        ]);
        return back()->with("success", "uploaded post successfully");
    }
}

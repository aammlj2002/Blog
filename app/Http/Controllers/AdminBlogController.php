<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view("admin.blog.index", [
            "blogs"=>Blog::latest()->paginate(15)
        ]);
    }
    public function create()
    {
        return view("admin.blog.create");
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
    public function edit(Blog $blog)
    {
        return view("admin.blog.edit", [
            "blog"=>$blog
        ]);
    }
}

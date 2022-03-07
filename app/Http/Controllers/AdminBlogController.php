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
        Blog::create([
            ...$this->validateBlog(), // validate form
            "user_id"=>auth()->user()->id, // get author
            "thumbnail"=>request()->file("thumbnail")->store("thumbnails") // store thumbnail in sotrage and path to db
        ]);
        return back()->with("success", "uploaded post successfully");
    }
    public function edit(Blog $blog)
    {
        return view("admin.blog.edit", [
            "blog"=>$blog
        ]);
    }
    public function update(Blog $blog)
    {
        $formData = $this->validateBlog($blog); // validate form
        if ($formData['thumbnail'] ?? false) {
            $formData["thumbnail"]=request()->file("thumbnail")->store("thumbnails");
        }
        $blog->update($formData);
        return redirect("/")->with("success", "updated blog successfully");
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect("/admin");
    }
    protected function validateBlog(?Blog $blog = null)
    {
        $blog ??= new Blog();
        return request()->validate([
            "title"=>"required",
            "thumbnail"=>$blog->exists ? "image" : "required|image", // image is optional in update blog
            "slug"=>["required", Rule::unique("blogs", "slug")->ignore($blog)],
            "intro"=>"required",
            "body"=>"required",
            "category_id"=>["required", Rule::exists("categories", "id")],
        ]);
    }
}

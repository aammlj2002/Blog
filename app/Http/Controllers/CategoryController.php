<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view("admin.category.index", [
            "categories"=>Category::latest()->paginate(10)
        ]);
    }
    public function store()
    {
        // validate
        $formData = request()->validate([
            "name"=>"required"
        ]);
        
        $formData["slug"]=Str::slug($formData["name"]);

        // store to db
        Category::create($formData);

        //redirect
        return back()->with("success", "added new category");
    }
    public function edit(Category $category)
    {
        return view("admin.category.edit", [
            "category"=>$category
        ]);
    }
    public function update(Category $category)
    {
        $formData = request()->validate([
            "name"=>"required",
        ]);
        $formData["slug"] = Str::slug($formData["name"]);
        $category->update($formData);
        return redirect("/admin/categories");
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with("success", "delete category");
    }
}

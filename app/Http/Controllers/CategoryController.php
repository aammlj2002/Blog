<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view("admin.category", [
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
}

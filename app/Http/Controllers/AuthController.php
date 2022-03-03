<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }
    public function post_register()
    {
        $formData = request()->validate([
            "name"=>"required | min:3 | max:30",
            "username"=>["required", "min:3", "max:30", Rule::unique("users", "username")],
            "email"=>["required", "email", Rule::unique("users", "email")],
            "password"=>"required | min:8 | max:30",
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect("/");
    }
    public function login()
    {
        return view("auth.login");
    }
    public function post_login()
    {
        $formData = request()->validate([
            "email"=>["required", "email", Rule::exists("users", "email")],
            "password"=>"required | min:8 | max:30",
        ]);
        if (auth()->attempt($formData)) {
            return redirect("/");
        } else {
            return redirect()->back()->withErrors([
                "password"=>"incorrect password"
            ]);
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect("/login");
    }
}

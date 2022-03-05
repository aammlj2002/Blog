<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $mgmg = User::factory()->create(["name"=>"Mg Mg", "username"=>"mgmg"]);
        $aungaung = User::factory()->create(["name"=>"Aung Aung", "username"=>"aungaung"]);
        User::factory()->create(["name"=>"zoro", "username"=>"zoro123", "email"=>"zoro@gmail.com", "password"=>"00000000"]);

        $frontend = Category::factory()->create(["name"=>"frontend", "slug"=>"frontend"]);
        $backend = Category::factory()->create(["name"=>"backend", "slug"=>"backend"]);

        Blog::factory(1)->create(["user_id"=>$mgmg->id, "category_id"=>$frontend->id]);
        Blog::factory(1)->create(["user_id"=>$mgmg->id, "category_id"=>$backend->id]);
        Blog::factory(1)->create(["user_id"=>$aungaung->id, "category_id"=>$frontend->id]);
        Blog::factory(1)->create(["user_id"=>$aungaung->id, "category_id"=>$backend->id]);

        Comment::factory()->create(["body"=>"hello", "user_id"=>1, "blog_id"=>2]);
        Comment::factory()->create(["body"=>"hello", "user_id"=>2, "blog_id"=>3]);
    }
}

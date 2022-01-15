<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
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
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $mgmg = User::factory()->create(["name"=>"Mg Mg", "username"=>"mgmg"]);
        $aungaung = User::factory()->create(["name"=>"Aung Aung", "username"=>"aungaung"]);

        $frontend = Category::factory()->create(["name"=>"frontend", "slug"=>"frontend"]);
        $backend = Category::factory()->create(["name"=>"backend", "slug"=>"backend"]);

        Blog::factory(10)->create(["user_id"=>$mgmg->id, "category_id"=>$frontend->id]);
        Blog::factory(10)->create(["user_id"=>$mgmg->id, "category_id"=>$backend->id]);
        Blog::factory(10)->create(["user_id"=>$aungaung->id, "category_id"=>$frontend->id]);
        Blog::factory(10)->create(["user_id"=>$aungaung->id, "category_id"=>$backend->id]);
    }
}

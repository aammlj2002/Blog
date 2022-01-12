<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->sentence(),
            "intro"=>$this->faker->sentence(),
            "body"=>$this->faker->paragraph(),
            "slug"=>$this->faker->slug(),
            "category_id"=>Category::factory(),
            "user_id"=>User::factory()
        ];
    }
}

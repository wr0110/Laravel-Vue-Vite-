<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence;

        return [
            'title' => $title,
            'content' => fake()->sentences(30, true),
            'slug' => Str::slug($title) . '-' . fake()->randomNumber(5),
            'author_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'featured' => fake()->randomElement([true, false]),
        ];
    }
}

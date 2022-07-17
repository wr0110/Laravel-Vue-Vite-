<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'title' => fake()->sentence,
            'content' => fake()->sentences(5, true),
            'author_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'featured' => fake()->randomElement([true, false]),
        ];
    }
}

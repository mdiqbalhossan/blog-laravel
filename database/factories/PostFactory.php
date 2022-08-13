<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body' => $this->faker->paragraph,
            'user_id' => 1,
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'image' => $this->faker->image('public/images/',640,480, null, false),
            'status' => $this->faker->randomElement(['1', '2']),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}

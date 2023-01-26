<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase,
            'content' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(1, 40),
            'is_published' => 1,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'thumbnail' => $this->faker->imageUrl(),
            'content' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'topic_id' => Topic::all()->random()->id,
        ];
    }
}

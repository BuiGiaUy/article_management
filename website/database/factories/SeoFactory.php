<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seo>
 */
class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seo_keywords' => $this->faker->words(5, true),
            'seo_description' => $this->faker->paragraph,
            'seo_title' => $this->faker->sentence,
            'post_id' => function () {
                return \App\Models\Post::factory()->create()->id;
            },
        ];
    }
}

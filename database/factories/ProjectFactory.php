<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Project> */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'slug' => fake()->unique()->slug(),
            'excerpt' => fake()->sentence(12),
            'description' => fake()->paragraphs(2, true),
            'image_url' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&w=1100&q=85',
            'category' => fake()->randomElement(['Product design', 'Brand identity', 'Web development']),
            'year' => fake()->numberBetween(2022, 2026),
            'is_published' => true,
        ];
    }
}

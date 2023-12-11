<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->text(30);
        $slug = str($name)->slug();
        return [
            'name' => $name,
            'slug' => $slug,
            'certificate' => 1,
            'type' => 'premium',
            'status' => 'published',
            'price' => random_int(90000, 500000),
            'level' => 'all-level',
            'description' => fake()->text(),
            'mentor_name' => fake()->name(),
            'start_course' => now(),
            'duration' => random_int(90, 200),
        ];
    }
}

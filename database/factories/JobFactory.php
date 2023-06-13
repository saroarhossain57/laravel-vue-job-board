<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'company' => fake()->company,
            'category' => fake()->randomElement(['Backend Engineer', 'Frontend Engineer', 'Full Stack Developer', 'UI/UX Designer', 'Web Developer']),
            'location' => fake()->city(),
            'salary_range' => fake()->randomNumber(3, true),
            'job_type' => fake()->randomElement(['Full Time', 'Part Time']),
            'skills' => fake()->words(3, true),
        ];
    }

    public function configure()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => User::where('role', 'employer')->inRandomOrder()->first()->id,
            ];
        });
    }
}

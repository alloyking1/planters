<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'company_name' => $this->faker->name(),
            'title' => $this->faker->name(),
            'contract' => $this->faker->name(),
            'location' => $this->faker->name(),
            'description' => $this->faker->realText($maxNbChars = 50),
            'about_company' => $this->faker->realText($maxNbChars = 50),
            'salary' => "$90,000 - $120,000",
            'application_link' => "https://laraveldev.pro",
        ];
    }
}

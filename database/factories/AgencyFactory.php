<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'type' => 'agency',
            'headquarters' => $this->faker->text(),
            'size' => $this->faker->text(),
            'project_size' => $this->faker->text(),
            'website' => $this->faker->text(),
            'short_description' => $this->faker->realText($maxNbChars = 50),
            'about_company' => $this->faker->realText($maxNbChars = 50),
        ];
    }
}

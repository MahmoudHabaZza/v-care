<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomePageService>
 */
class HomePageServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueHomePageService = fake()->generateHomePageService();
        return [
            'icon' => $uniqueHomePageService['icon'],
            'title' => $uniqueHomePageService['title'],
            'description' => $uniqueHomePageService['description'],
        ];
    }
}

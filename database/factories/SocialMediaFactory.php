<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialMedia>
 */
class SocialMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueSocialMedia = fake()->uniqueSocialMedia();
        return [
            'icon' => $uniqueSocialMedia['icon'],
            'name' => $uniqueSocialMedia['name'],
            'link' => $uniqueSocialMedia['link'],
        ];
    }
}

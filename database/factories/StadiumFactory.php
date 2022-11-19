<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stadium>
 */
class StadiumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'spectators' => $this->faker->randomNumber(),
            'square_metre' => $this->faker->randomNumber(),
            'doors_closed' => $this->faker->boolean(),
            'user_id' => User::factory(),
        ];
    }
}

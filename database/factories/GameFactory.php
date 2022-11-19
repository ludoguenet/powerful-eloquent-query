<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\City;
use App\Models\Schedule;
use App\Models\Stadium;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'team_one' => $this->faker->word,
            'team_two' => $this->faker->word,
            'stadium_id' => Stadium::factory(),
            'city_id' => City::factory(),
            'schedule_id' => Schedule::factory(),
        ];
    }
}

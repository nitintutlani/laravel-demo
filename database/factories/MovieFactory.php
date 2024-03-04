<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'episode_id' => $this->faker->randomDigit,
            'opening_crawl' => $this->faker->paragraph,
            'director' => $this->faker->name,
            'release_date' => $this->faker->date,
            'actor_id' => function() {
                return Actor::all()->random()->id;
            },
        ];
    }
}

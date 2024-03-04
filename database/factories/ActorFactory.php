<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Actor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
{
    protected $model = Actor::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'birth_year' => $this->faker->year,
            'eye_color' => $this->faker->safeColorName,
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Non-Binary']),
            'hair_color' => $this->faker->safeColorName,
        ];
    }
}

<?php

namespace Core\TennisTournament\Players\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerEloquentFactory extends Factory
{
    protected $model = PlayerEloquentModel::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->firstName,
            'skill' => $this->faker->numberBetween(1, 100),
            'gender' => $this->faker->randomElement(['female', 'male']),
            'reaction_time' => $this->faker->randomFloat(2, 0, 10),
            'strength' => $this->faker->numberBetween(1, 100),
            'speed'    => $this->faker->randomFloat(2, 0, 10)
        ];
    }
}

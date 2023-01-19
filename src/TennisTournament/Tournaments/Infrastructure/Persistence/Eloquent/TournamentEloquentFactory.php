<?php

namespace Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

class TournamentEloquentFactory extends Factory
{
    protected $model = TournamentEloquentModel::class;

    public function definition()
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->company,
            'modality' => $this->faker->randomElement(['elimination']),
            'gender' => $this->faker->randomElement(['female', 'male'])
        ];
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Core\TennisTournament\Players\Infrastructure\Persistence\Eloquent\PlayerEloquentModel;
use Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent\TournamentEloquentModel;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class DatabaseSeeder extends Seeder
{
    use WithFaker;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TournamentEloquentModel::factory()
            ->state(['gender' => 'male'])
            ->hasAttached(
                PlayerEloquentModel::factory(16)->state([
                    'gender' => 'male',
                    'reaction_time' => null,
                ]),
                ['is_winner' => false],
                'players'
            )
            ->create();
    }
}

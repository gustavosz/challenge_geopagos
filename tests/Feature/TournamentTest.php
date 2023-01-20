<?php

namespace Tests\Feature;

use Core\TennisTournament\Players\Infrastructure\Persistence\Eloquent\PlayerEloquentModel;
use Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent\TournamentEloquentModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TournamentTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_endpoint_simulate_returns_a_successful_response(): void
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

        $tournamentModel = TournamentEloquentModel::query()->inRandomOrder()->first();

        $response = $this->postJson("api/tournaments/$tournamentModel->id/simulate");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'name',
                'modality',
                'gender',
                'winner' => [
                    'id',
                    'name',
                    'skill',
                    'gender',
                    'strength',
                    'speed'
                ]
            ]);
    }

    public function test_the_endpoint_simulate_returns_a_tournament_has_already_finished(): void
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

        $tournamentModel = TournamentEloquentModel::query()->inRandomOrder()->first();

        $this->postJson("api/tournaments/$tournamentModel->id/simulate");

        $response = $this->postJson("api/tournaments/$tournamentModel->id/simulate");

        $response->assertStatus(500)
            ->assertJson([
                'message' => 'The tournament has already finished'
            ]);
    }
}

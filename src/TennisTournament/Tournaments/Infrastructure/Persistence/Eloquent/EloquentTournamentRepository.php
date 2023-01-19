<?php

namespace Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent;

use Core\Shared\Domain\Tournament;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentPlayers;
use Core\TennisTournament\Tournaments\Domain\EliminationTournament;
use Core\TennisTournament\Tournaments\Domain\TournamentGender;
use Core\TennisTournament\Tournaments\Domain\TournamentModality;
use Core\TennisTournament\Tournaments\Domain\TournamentName;
use Core\TennisTournament\Tournaments\Domain\TournamentRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class EloquentTournamentRepository implements TournamentRepository
{
    public function find(TournamentId $id): ?Tournament
    {
        $model = TournamentEloquentModel::query()->with('players')->find($id->value());

        if (null === $model) {
            return null;
        }

        return new EliminationTournament(
            $id,
            new TournamentName($model->name),
            new TournamentModality($model->modality),
            new TournamentGender($model->gender),
            new TournamentPlayers($model->playersToDomain(), $model->gender)
        );
    }

    public function simulate(Tournament $tournament): void
    {
        $tournamentModel = TournamentEloquentModel::query()->find($tournament->id()->value());

        throw_if($tournamentModel->winner(), 'The tournament has already finished');

        DB::beginTransaction();
        try {
            $rounds = $tournament->rounds();
            foreach ($rounds as $round) {
                $roundId = DB::table('rounds')->insertGetId([
                    'tournament_id' => $tournament->id()->value(),
                ]);

                foreach ($round->games() as $game) {
                    $gameId = DB::table('games')->insertGetId([
                        'round_id' => $roundId
                    ]);

                    $winnerId = $game->winner()->id()->value();
                    $player1Id = $game->player1()->id()->value();
                    DB::table('game_player')->insert([
                        'game_id' => $gameId,
                        'player_id' => $player1Id,
                        'is_winner' => $player1Id === $winnerId
                    ]);

                    $player2Id = $game->player2()->id()->value();
                    DB::table('game_player')->insert([
                        'game_id' => $gameId,
                        'player_id' => $player2Id,
                        'is_winner' => $player2Id === $winnerId
                    ]);
                }
            }

            DB::table('player_tournament')
                ->where('player_id', $tournament->winner()->id()->value())
                ->where('tournament_id', $tournament->id()->value())
                ->update([
                    'is_winner' => true
                ]);

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new RuntimeException(
                $exception->getMessage(),
                $exception->getCode(),
                $exception->getPrevious()
            );
        }
    }
}

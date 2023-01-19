<?php

namespace Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent;

use Core\Shared\Domain\Tournament;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;
use Core\TennisTournament\Tournaments\Domain\EliminationTournament;
use Core\TennisTournament\Tournaments\Domain\TournamentGender;
use Core\TennisTournament\Tournaments\Domain\TournamentModality;
use Core\TennisTournament\Tournaments\Domain\TournamentPlayers;
use Core\TennisTournament\Tournaments\Domain\TournamentRepository;

class EloquentTournamentRepository implements TournamentRepository
{
    public function find(TournamentId $id): ?Tournament
    {
        $model = TournamentEloquentModel::query()->with('players')->find($id->value());

        if (null === $model) {
            return null;
        }

        return new EliminationTournament(
            new TournamentModality($model->modality),
            new TournamentGender($model->gender),
            new TournamentPlayers($model->playersToDomain(), $model->gender)
        );
    }
}

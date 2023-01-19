<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\Tournament;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;

interface TournamentRepository
{
    public function find(TournamentId $id): ?Tournament;

    public function simulate(Tournament $tournament): void;
}

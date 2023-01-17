<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\DomainError;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;

final class TournamentNotExist extends DomainError
{
    private TournamentId $id;

    public function __construct(TournamentId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    protected function errorMessage(): string
    {
        return sprintf('The tournament <%s> does not exist', $this->id->value());
    }

    public function errorCode(): string
    {
        return 'tournament_not_exist';
    }
}

<?php

namespace Core\TennisTournament\Tournaments\Application\Simulate;

use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;
use Core\TennisTournament\Tournaments\Domain\TournamentNotExist;
use Core\TennisTournament\Tournaments\Domain\TournamentRepository;

class TournamentSimulator
{
    private TournamentRepository $repository;

    public function __construct(TournamentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TournamentId $id)
    {
        $tournament = $this->repository->find($id);

        if (null === $tournament) {
            throw new TournamentNotExist($id);
        }

        $tournament->simulate();

        return $tournament->winner();
    }
}

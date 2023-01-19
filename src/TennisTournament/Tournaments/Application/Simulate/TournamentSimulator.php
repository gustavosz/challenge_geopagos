<?php

namespace Core\TennisTournament\Tournaments\Application\Simulate;

use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;
use Core\TennisTournament\Tournaments\Application\Responses\TournamentResponse;
use Core\TennisTournament\Tournaments\Domain\TournamentNotExist;
use Core\TennisTournament\Tournaments\Domain\TournamentRepository;

final class TournamentSimulator
{
    private TournamentRepository $repository;

    public function __construct(TournamentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TournamentId $id): TournamentResponse
    {
        $tournament = $this->repository->find($id);

        if (null === $tournament) {
            throw new TournamentNotExist($id);
        }

        $tournament->simulate();

        $this->repository->simulate($tournament);

        return new TournamentResponse($tournament);
    }
}

<?php

namespace Core\TennisTournament\Tournaments\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;
use Core\TennisTournament\Tournaments\Application\Simulate\TournamentSimulator;
use Core\TennisTournament\Tournaments\Infrastructure\Persistence\Eloquent\EloquentTournamentRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SimulateTournamentGetController extends Controller
{
    private EloquentTournamentRepository $repository;

    public function __construct(EloquentTournamentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id): JsonResponse
    {
        $winner = (new TournamentSimulator($this->repository))(
            new TournamentId($id)
        );

        return new JsonResponse([
            $winner
        ], Response::HTTP_OK);
    }
}

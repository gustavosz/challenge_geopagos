<?php

namespace Core\TennisTournament\Tournaments\Application\Responses;

use Core\Shared\Domain\Tournament;
use Core\TennisTournament\Players\Application\Responses\PlayerResponse;

final class TournamentResponse
{
    private $name, $modality, $gender, $winner;

    public function __construct(Tournament $tournament)
    {
        $this->name = $tournament->name()->value();
        $this->modality = $tournament->modality()->value();
        $this->gender = $tournament->gender()->value();
        $this->winner = $tournament->winner();
    }

    public function toArray(): array
    {
        $winnerResponse = null;
        if ($this->winner) {
            $winnerResponse = (new PlayerResponse($this->winner))->toArray();
        }

        return [
            'name' => $this->name,
            'modality' => $this->modality,
            'gender' => $this->gender,
            'winner' => $winnerResponse,
        ];
    }
}

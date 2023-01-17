<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\Player;
use Core\Shared\Domain\Tournament;

class EliminationTournament extends Tournament
{
    protected $players;
    protected $rounds;
    protected $winner;

    public function __construct(TournamentModality $modality, TournamentGender $gender, TournamentPlayers $players)
    {
        parent::__construct($modality, $gender);
        $this->players = $players;
        $this->rounds = array();
    }

    public function players(): TournamentPlayers
    {
        return $this->players;
    }

    public function rounds(): array
    {
        return $this->rounds;
    }

    public function winner(): Player
    {
        return $this->winner;
    }

    public function simulate()
    {
        // TODO: Implement simulate() method.
    }

    public function calculateWinner()
    {
        // TODO: Implement calculateWinner() method.
    }

    public function getWinner()
    {
        // TODO: Implement getWinner() method.
    }
}

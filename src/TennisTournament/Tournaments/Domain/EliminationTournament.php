<?php


namespace Core\TennisTournament\Tournaments\Domain;


use Core\Shared\Domain\Tournament;

class EliminationTournament extends Tournament
{
    protected $players;

    public function __construct($modality, $gender, $players)
    {
        parent::__construct($modality, $gender);
        $this->players = $players;
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

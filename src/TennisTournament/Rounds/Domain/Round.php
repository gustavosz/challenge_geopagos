<?php

namespace Core\TennisTournament\Rounds\Domain;

class Round
{
    private $players;
    private $games;

    public function __construct(array $players)
    {
        $this->players = $players;

        $this->games = array();
    }

    public function play()
    {
        //TODO: implement logic for assign round-game
    }

    public function winners()
    {
        //TODO: implement logic for get winners from round
    }
}

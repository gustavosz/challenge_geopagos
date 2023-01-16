<?php

namespace Core\TennisTournament\Games\Domain;

use Core\Shared\Domain\Player;

class Game
{
    private $player1;
    private $player2;
    private $winner;

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function play()
    {
        //TODO: implement logic for get winner
    }

    public function player1(): Player
    {
        return $this->player1;
    }

    public function player2(): Player
    {
        return $this->player2;
    }

    public function winner(): Player
    {
        return $this->winner;
    }
}

<?php

namespace Core\TennisTournament\Games\Domain;

use Core\Shared\Domain\Player;
use Core\TennisTournament\Players\Domain\FemalePlayer;
use Core\TennisTournament\Players\Domain\MalePlayer;

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

    public function play(): Player
    {
        $player1WinProbability = 0;
        $player2WinProbability = 0;

        if ($this->player1 instanceof FemalePlayer) {
            $player1WinProbability =
                $this->player1->skill()->value() +
                $this->player1->reactionTime()->value() +
                random_int(1, 100);

            $player2WinProbability =
                $this->player2->skill()->value() +
                $this->player2->reactionTime()->value() +
                random_int(1, 100);

        } elseif ($this->player1 instanceof MalePlayer) {
            $player1WinProbability =
                $this->player1->skill()->value() +
                ($this->player1->strength()->value() + $this->player1->speed()->value()) / 2 +
                random_int(1, 100);

            $player2WinProbability =
                $this->player2->skill()->value() +
                ($this->player2->strength()->value() + $this->player2->speed()->value()) / 2 +
                random_int(1, 100);
        }

        $winner = $player1WinProbability > $player2WinProbability ? $this->player1 : $this->player2;

        $this->winner = $winner;

        return $winner;
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

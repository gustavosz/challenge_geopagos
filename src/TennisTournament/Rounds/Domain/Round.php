<?php

namespace Core\TennisTournament\Rounds\Domain;

use Core\TennisTournament\Games\Domain\Game;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentPlayers;

class Round
{
    private $players;
    private $games;

    public function __construct(TournamentPlayers $players)
    {
        $this->players = $players;
        $this->games = array();
    }

    public function play()
    {
        $players = $this->players->players();

        for ($i = 0, $iMax = count($players); $i < $iMax; $i += 2) {
            $game = new Game($players[$i], $players[$i + 1]);
            $game->play();
            $this->games[] = $game;
        }
    }

    public function winners(): array
    {
        $winners = array();

        foreach ($this->games as $game) {
            $winners[] = $game->winner();
        }

        return $winners;
    }
}

<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\Player;
use Core\Shared\Domain\Tournament;
use Core\TennisTournament\Rounds\Domain\Round;
use Core\TennisTournament\Shared\Domain\Tournament\TournamentPlayers;

class EliminationTournament extends Tournament
{
    protected $players;
    protected $rounds;
    protected $winner;

    public function __construct(TournamentName $name, TournamentModality $modality, TournamentGender $gender, TournamentPlayers $players)
    {
        parent::__construct($name, $modality, $gender);
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

    public function winner(): ?Player
    {
        return $this->winner;
    }

    public function simulate()
    {
        $players = $this->players->players();

        // while more than one participant remains
        while (count($players) > 1) {
            // new round
            $round = new Round(new TournamentPlayers($players, $this->gender->value()));
            // play round
            $round->play();
            // get round winners
            $players = $round->winners();
            // add round to tournament
            $this->rounds[] = $round;
        }
        // assign winner to tournament
        $this->winner = $players[0];
    }
}

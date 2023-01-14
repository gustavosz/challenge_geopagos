<?php

namespace Core\Shared\Domain;

use Core\TennisTournament\Tournaments\Domain\TournamentGender;
use Core\TennisTournament\Tournaments\Domain\TournamentModality;

abstract class Tournament
{
    protected $modality;
    protected $gender;

    public function __construct(TournamentModality $modality, TournamentGender $gender)
    {
        $this->modality = $modality;
        $this->gender = $gender;
    }

    abstract public function simulate();

    abstract public function calculateWinner();

    abstract public function getWinner();

    public function modality(): TournamentModality
    {
        return $this->modality;
    }

    public function gender(): TournamentGender
    {
        return $this->gender;
    }
}

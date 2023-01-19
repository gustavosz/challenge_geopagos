<?php

namespace Core\Shared\Domain;

use Core\TennisTournament\Tournaments\Domain\TournamentGender;
use Core\TennisTournament\Tournaments\Domain\TournamentModality;
use Core\TennisTournament\Tournaments\Domain\TournamentName;

abstract class Tournament
{
    protected $modality;
    protected $gender;
    protected $name;

    public function __construct(TournamentName $name, TournamentModality $modality, TournamentGender $gender)
    {
        $this->name = $name;
        $this->modality = $modality;
        $this->gender = $gender;
    }

    abstract public function simulate();

    public function name(): TournamentName
    {
        return $this->name;
    }

    public function modality(): TournamentModality
    {
        return $this->modality;
    }

    public function gender(): TournamentGender
    {
        return $this->gender;
    }
}

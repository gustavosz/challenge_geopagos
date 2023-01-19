<?php

namespace Core\Shared\Domain;

use Core\TennisTournament\Shared\Domain\Tournament\TournamentId;
use Core\TennisTournament\Tournaments\Domain\TournamentGender;
use Core\TennisTournament\Tournaments\Domain\TournamentModality;
use Core\TennisTournament\Tournaments\Domain\TournamentName;

abstract class Tournament
{
    protected TournamentId $id;
    protected TournamentModality $modality;
    protected TournamentGender $gender;
    protected TournamentName $name;

    public function __construct(TournamentId $id, TournamentName $name, TournamentModality $modality, TournamentGender $gender)
    {
        $this->id = $id;
        $this->name = $name;
        $this->modality = $modality;
        $this->gender = $gender;
    }

    abstract public function simulate();

    public function id(): TournamentId
    {
        return $this->id;
    }

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

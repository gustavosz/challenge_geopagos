<?php

namespace Core\Shared\Domain;

use Core\TennisTournament\Players\Domain\PlayerGender;
use Core\TennisTournament\Players\Domain\PlayerId;
use Core\TennisTournament\Players\Domain\PlayerName;
use Core\TennisTournament\Players\Domain\PlayerSkill;

abstract class Player
{
    protected $id;
    protected $name;
    protected $skill;
    protected $gender;

    public function __construct(PlayerId $id, PlayerName $name, PlayerSkill $skill, PlayerGender $gender)
    {
        $this->id = $id;
        $this->name = $name;
        $this->skill = $skill;
        $this->gender = $gender;
    }

    public function id(): PlayerId
    {
        return $this->id;
    }

    public function name(): PlayerName
    {
        return $this->name;
    }

    public function skill(): PlayerSkill
    {
        return $this->skill;
    }

    public function gender(): PlayerGender
    {
        return $this->gender;
    }
}

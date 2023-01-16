<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\Player;

final class MalePlayer extends Player
{
    protected $strength;
    protected $speed;

    public function __construct(PlayerName $name, PlayerSkill $skill, PlayerGender $gender, PlayerStrength $strength, PlayerSpeed $speed)
    {
        parent::__construct($name, $skill, $gender);
        $this->strength = $strength;
        $this->speed = $speed;
    }

    public function strength(): PlayerStrength
    {
        return $this->strength;
    }

    public function speed(): PlayerSpeed
    {
        return $this->speed;
    }
}

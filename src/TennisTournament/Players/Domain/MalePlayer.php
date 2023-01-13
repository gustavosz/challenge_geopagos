<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\Player;

final class MalePlayer extends Player
{
    protected $strength;
    protected $speed;

    public function __construct($name, $skill, $gender, $strength, $speed)
    {
        parent::__construct($name, $skill, $gender);
        $this->strength = $strength;
        $this->speed = $speed;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
}

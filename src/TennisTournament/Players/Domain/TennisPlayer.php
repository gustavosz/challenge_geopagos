<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\Player;

final class TennisPlayer extends Player
{
    protected $look;
    protected $gender;

    public function __construct($name, $skill, $look, $gender)
    {
        parent::__construct($name, $skill);
        $this->look = $look;
        $this->gender = $gender;
    }

    public function getLook()
    {
        return $this->look;
    }

    public function getGender()
    {
        return $this->gender;
    }
}

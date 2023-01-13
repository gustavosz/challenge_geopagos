<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\Player;

final class FemalePlayer extends Player
{
    protected $reactionTime;

    public function __construct($name, $skill, $gender, $reactionTime)
    {
        parent::__construct($name, $skill, $gender);
        $this->reactionTime = $reactionTime;
    }

    public function getReactionTime()
    {
        return $this->reactionTime;
    }
}

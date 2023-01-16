<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\Player;

final class FemalePlayer extends Player
{
    protected $reactionTime;

    public function __construct(PlayerName $name, PlayerSkill $skill, PlayerGender $gender, PlayerReactionTime $reactionTime)
    {
        parent::__construct($name, $skill, $gender);
        $this->reactionTime = $reactionTime;
    }

    public function reactionTime(): PlayerReactionTime
    {
        return $this->reactionTime;
    }
}

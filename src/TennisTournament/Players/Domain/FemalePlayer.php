<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\Player;

final class FemalePlayer extends Player
{
    protected PlayerReactionTime $reactionTime;

    public function __construct(PlayerId $id, PlayerName $name, PlayerSkill $skill, PlayerGender $gender, PlayerReactionTime $reactionTime)
    {
        parent::__construct($id, $name, $skill, $gender);
        $this->reactionTime = $reactionTime;
    }

    public function reactionTime(): PlayerReactionTime
    {
        return $this->reactionTime;
    }
}

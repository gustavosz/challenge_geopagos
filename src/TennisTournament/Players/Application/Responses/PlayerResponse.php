<?php

namespace Core\TennisTournament\Players\Application\Responses;

use Core\Shared\Domain\Player;
use Core\TennisTournament\Players\Domain\FemalePlayer;
use Core\TennisTournament\Players\Domain\MalePlayer;

class PlayerResponse
{
    private string $id;
    private string $name;
    private int $skill;
    private string $gender;
    private Player $player;

    public function __construct(Player $player)
    {
        $this->id = $player->id()->value();
        $this->name = $player->name()->value();
        $this->skill = $player->skill()->value();
        $this->gender = $player->gender()->value();
        $this->player = $player;
    }

    public function toArray(): array
    {
        $values = [
            'id' => $this->id,
            'name' => $this->name,
            'skill' => $this->skill,
            'gender' => $this->gender
        ];

        $additionalValues = array();

        if ($this->player instanceof FemalePlayer) {
            $additionalValues = [
                'reaction_time' => $this->player->reactionTime()->value()
            ];
        } elseif ($this->player instanceof MalePlayer) {
            $additionalValues = [
                'strength' => $this->player->strength()->value(),
                'speed' => $this->player->speed()->value()
            ];
        }

        return array_merge($values, $additionalValues);
    }
}

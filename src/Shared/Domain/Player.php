<?php

namespace Core\Shared\Domain;

abstract class Player
{
    protected $name;
    protected $skill;

    public function __construct($name, $skill)
    {
        $this->name = $name;
        $this->skill = $skill;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSkill()
    {
        return $this->skill;
    }
}

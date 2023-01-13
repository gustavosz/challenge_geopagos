<?php

namespace Core\Shared\Domain;

abstract class Player
{
    protected $name;
    protected $skill;
    protected $gender;

    public function __construct($name, $skill, $gender)
    {
        $this->name = $name;
        $this->skill = $skill;
        $this->gender = $gender;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSkill()
    {
        return $this->skill;
    }

    public function getGender()
    {
        return $this->gender;
    }
}

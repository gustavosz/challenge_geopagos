<?php


namespace Core\Shared\Domain;


abstract class Tournament
{
    protected $modality;
    protected $gender;

    public function __construct($modality, $gender)
    {
        $this->modality = $modality;
        $this->gender = $gender;
    }

    abstract public function simulate();

    abstract public function calculateWinner();

    abstract public function getWinner();

    public function getModality()
    {
        return $this->modality;
    }

    public function getGender()
    {
        return $this->gender;
    }
}

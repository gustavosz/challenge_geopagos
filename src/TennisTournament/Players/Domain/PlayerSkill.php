<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\ValueObject\IntValueObject;
use InvalidArgumentException;

final class PlayerSkill extends IntValueObject
{
    public function __construct(int $value)
    {
        parent::__construct($value);

        $this->ensureIsBetweenCorrectValue($value);
    }

    private function ensureIsBetweenCorrectValue(int $value): void
    {
        if ($value < 0 || $value > 100) {
            throw new InvalidArgumentException('The player-skill value is not between 0-100 ');
        }
    }
}

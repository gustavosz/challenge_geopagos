<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\ValueObject\EnumValueObject;
use InvalidArgumentException;

final class TournamentGender extends EnumValueObject
{
    public const FEMALE = 'female';
    public const MALE = 'male';

    protected function throwExceptionForInvalidValue($value): void
    {
        throw new InvalidArgumentException(sprintf('The value-gender <%s> is invalid', $value));
    }
}

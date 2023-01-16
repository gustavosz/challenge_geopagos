<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\ValueObject\EnumValueObject;
use InvalidArgumentException;

final class TournamentModality extends EnumValueObject
{
    public const ELIMINATION = 'elimination';

    protected function throwExceptionForInvalidValue($value)
    {
        throw new InvalidArgumentException(sprintf('The value-modality <%s> is invalid', $value));
    }
}

<?php

namespace Core\TennisTournament\Players\Domain;

use Core\Shared\Domain\ValueObject\EnumValueObject;
use InvalidArgumentException;

final class PlayerGender extends EnumValueObject
{
    protected function throwExceptionForInvalidValue($value): void
    {
        throw new InvalidArgumentException(sprintf('The value <%s> is invalid', $value));
    }
}

<?php

namespace Core\TennisTournament\Tournaments\Domain;

use Core\Shared\Domain\ValueObject\EnumValueObject;
use InvalidArgumentException;

final class TournamentPlayers extends EnumValueObject
{
    protected $players;

    public function __construct(array $players, $gender)
    {
        parent::__construct($gender);

        $this->ensurePlayerIsCorrectGender($players, $gender);

        $this->players = $players;
    }

    public function players(): array
    {
        return $this->players;
    }

    protected function throwExceptionForInvalidValue($value): void
    {
        throw new InvalidArgumentException(sprintf('The value gender <%s> is invalid', $value));
    }

    private function ensurePlayerIsCorrectGender(array $players, $gender): void
    {
        if (empty($players)) {
            throw new InvalidArgumentException('The value players cannot be empty');
        }

        foreach ($players as $player) {
            if ($player->getGender() !== $gender) {
                throw new InvalidArgumentException('The value gender-player are not equal');
            }
        }
    }
}

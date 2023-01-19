<?php

namespace Core\TennisTournament\Shared\Domain\Tournament;

use Core\Shared\Domain\ValueObject\EnumValueObject;
use InvalidArgumentException;
use LengthException;

final class TournamentPlayers extends EnumValueObject
{
    public const FEMALE = 'female';
    public const MALE = 'male';

    protected $players;

    public function __construct(array $players, $gender)
    {
        parent::__construct($gender);

        $this->ensurePlayerIsNotEmpty($players);

        $this->ensureQuantityPlayers($players);

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
        foreach ($players as $player) {
            if ($player->gender()->value() !== $gender) {
                throw new InvalidArgumentException('The value gender-player are not equal');
            }
        }
    }

    private function ensurePlayerIsNotEmpty(array $players): void
    {
        if (empty($players)) {
            throw new InvalidArgumentException('The value players cannot be empty');
        }
    }

    private function ensureQuantityPlayers(array $players): void
    {
        $numPlayers = count($players);

        if (!(ceil(log($numPlayers, 2)) === floor(log($numPlayers, 2)))) {
            throw new LengthException('The number of players is not power of two');
        }
    }
}

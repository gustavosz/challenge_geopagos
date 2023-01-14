<?php

namespace Core\Shared\Domain\ValueObject;

use Core\Shared\Domain\Utils;
use ReflectionClass;
use function Lambdish\Phunctional\reindex;

abstract class EnumValueObject
{
    protected static $cache = [];
    protected $value;

    public function __construct($value)
    {
        $this->ensureIsBetweenAcceptedValues($value);

        $this->value = $value;
    }

    abstract protected function throwExceptionForInvalidValue($value);

    public static function __callStatic(string $name, $args)
    {
        return new static(self::values()[$name]);
    }

    public static function values(): array
    {
        $class = static::class;

        if (!isset(self::$cache[$class])) {
            $reflected           = new ReflectionClass($class);
            self::$cache[$class] = reindex(self::keysFormatter(), $reflected->getConstants());
        }

        return self::$cache[$class];
    }

    public function value()
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    private function ensureIsBetweenAcceptedValues($value): void
    {
        if (!in_array($value, static::values(), true)) {
            $this->throwExceptionForInvalidValue($value);
        }
    }

    private static function keysFormatter(): callable
    {
        return static function ($unused, string $key): string {
            return Utils::toCamelCase(strtolower($key));
        };
    }
}

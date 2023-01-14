<?php

namespace Core\Shared\Domain;

final class Utils
{
    public static function toCamelCase(string $text): string
    {
        return lcfirst(str_replace('_', '', ucwords($text, '_')));
    }
}

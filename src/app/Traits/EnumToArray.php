<?php

namespace App\Traits;

trait EnumToArray
{
    public static function getNames(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getArray(): array
    {
        return array_combine(self::getValues(), self::getNames());
    }
}

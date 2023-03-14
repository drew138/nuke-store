<?php

namespace App\Faker;

use Faker\Provider\Base;

class BombProvider extends Base
{
    protected static $names = [
        'Mark 1',
        'Mark 2',
        'Mark 3',
        'Mark 4',
        'Mark 5',
        'Mark 6',
        'Mark 7',
        'Mark 8',
        'Mark 9',
        'Mark 10',
        'Mark 11',
        'Mark 12',
        'Mark 13',
        'Mark 14',
        'Mark 15',
        'Mark 16',
        'Mark 17',
        'Mark 18',
        'Mark 19',
        'Mark 20',
        'Mark 21',
        'Mark 22',
        'Mark 23',
        'Mark 24',
        'Mark 25',
        'Mark 26',
        'Mark 27',
    ];
    protected static $types = [
        'Hydrogen',
        'Uranium',
        'Plutonium',
        'Neutron',
    ];
    protected static $images = [
        ''
    ];
    public function bombName(): string
    {
        return static::randomElement(static::$names);
    }
    public function bombType(): string
    {
        return static::randomElement(static::$types);
    }
    public function bombImage(): string
    {
        return static::randomElement(static::$images);
    }
}
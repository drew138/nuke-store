<?php

namespace App\Faker;

use App\Enums\BombTypeEnum;
use Faker\Provider\Base;

class BombProvider extends Base
{
    protected static $names = [
        'Fat Man',
        'Little Boy',
        'Tsar Bomba',
        'B83 nuclear bomb',
        'Davy Crockett',
        'W88 warhead',
        'Mk-48 torpedo',
        'B61 nuclear bomb',
        'Mk-84 bomb',
        'B53 nuclear bomb',
        'BLU-82',
        'M388 Davy Crockett',
        'MGM-31 Pershing',
        'MGM-118A Peacekeeper',
        'B28 nuclear bomb',
        'Mk-12 Special Purpose Rifle',
        'AGM-28 Hound Dog',
        'GBU-43/B Massive Ordnance Air Blast',
        'GBU-57A/B Massive Ordnance Penetrator',
        'GBU-28',
        'Mk-20 Rockeye II',
        'GBU-15',
        'BLU-109',
        'GBU-39 Small Diameter Bomb',
        'GBU-24 Paveway III',
        'Mk-82 bomb',
        'Mk-83 bomb',
        'Mk-84 bomb',
        'GBU-10 Paveway II',
        'GBU-12 Paveway II',
        'GBU-27 Paveway III',
        'GBU-28 Paveway III',
        'B43 nuclear bomb',
        'B57 nuclear bomb',
        'B61-12 nuclear bomb',
        'B83-1 nuclear bomb',
        'B61-7 nuclear bomb',
        'B61-11 nuclear bomb',
        'B61-4 nuclear bomb',
        'B61-10 nuclear bomb',
        'B61-3 nuclear bomb',
        'B83-0 nuclear bomb',
        'B61-14 nuclear bomb',
        'B61-13 nuclear bomb',
        'Mk-6 nuclear bomb',
        'Mk-7 nuclear bomb',
        'Mk-16 nuclear bomb',
        'Mk-21 nuclear bomb',
        'Mk-17 nuclear bomb',
        'Mk-24 nuclear bomb',
        'Mk-36 nuclear bomb',
        'Mk-39 nuclear bomb',
        'Mk-41 nuclear bomb',
    ];

    protected static $images = [
        '/storage/641124e367d94faker_image_1.jpg',
        '/storage/641125c4e9fb6faker_image_3.jpg',
        '/storage/6411253b9040efaker_image_2.gif',
    ];

    public function bombName(): string
    {
        return static::randomElement(static::$names);
    }

    public function bombType(): string
    {
        return static::randomElement(BombTypeEnum::getValues());
    }

    public function bombImage(): string
    {
        return static::randomElement(static::$images);
    }
}

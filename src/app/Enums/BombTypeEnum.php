<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum BombTypeEnum: string
{
    use EnumToArray;
    case ATOMIC_BOMB = 'atomic_bomb';
    case HYDROGEN_BOMB = 'hydrogen_bomb';
    case NEUTRON_BOMB = 'neutron_bomb';
    case DIRTY_BOMB = 'dirty_bomb';
    case COBALT_BOMB = 'cobalt_bomb';
    case BACKPACK_NUKE = 'backpack_nuke';
};

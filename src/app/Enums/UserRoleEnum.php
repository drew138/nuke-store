<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum UserRoleEnum: string
{
    use EnumToArray;
    case USER = 'user';
    case ADMIN = 'admin';
};

<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum UserRoleEnum: string
{
    use EnumToArray;
    case CLIENT = 'client';
    case ADMIN = 'admin';
};

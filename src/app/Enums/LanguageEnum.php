<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum LanguageEnum: string
{
    use EnumToArray;
    case ENGLISH = 'en';
    case RUSSIAN = 'ru';
};

<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum PaymentMessagesEnum: int
{
    use EnumToArray;
    case ERROR_NO_FUNDS = 1;
    case ERROR_NO_STOCK = -1;
    case SUCCESS = 3;
};

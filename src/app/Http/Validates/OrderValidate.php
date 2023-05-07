<?php

namespace App\Http\Validates;

use Illuminate\Http\Request;

class OrderValidate
{
    public static function validateRequest(Request $request): void
    {
        $request->validate([
            'total' => ['required', 'integer', 'min:0'],
        ]);
    }
}

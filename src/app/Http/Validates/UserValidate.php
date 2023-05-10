<?php

namespace App\Http\Validates;

use Illuminate\Http\Request;

class UserValidate
{
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'string|min:3|max:255',
            'role' => 'string',
            'balance' => 'gte:0',
            'country' => 'string',
            'profile_picture' => 'image',
        ]);
    }

    public static function validateAndPassword(Request $request): void
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'email' => 'required|email',
        ]);
    }
}

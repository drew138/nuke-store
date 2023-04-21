<?php

namespace App\Http\Validates;

use Illuminate\Http\Request;

class ReviewValidate
{
    public static function validate(Request $request): void
    {
        $request->validate([
            'title' => 'required | string',
            'rating' => 'required | gte:1 | lte:5',
            'image' => 'image',
            'description' => 'required | string',
            'is_verified' => 'boolean',
        ]);
    }
}

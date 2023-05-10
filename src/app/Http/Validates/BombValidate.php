<?php

namespace App\Http\Validates;

use Illuminate\Http\Request;

class BombValidate
{
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|gt:0',
            'location_country' => 'required|string',
            'manufacturing_country' => 'required|string',
            'stock' => 'required|gte:0',
            'image' => 'image',
            'destruction_power' => 'required|gte:0',
        ]);
    }
}

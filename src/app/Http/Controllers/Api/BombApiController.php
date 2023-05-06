<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BombResource;
use App\Models\Bomb;
use Illuminate\Http\JsonResponse;

class BombApiController extends Controller
{
    public function index(): JsonResponse
    {
        $bombs = BombResource::collection(Bomb::all());

        return response()->json($bombs, 200);
    }

    public function show(string $id): JsonResponse
    {
        $bomb = new BombResource(Bomb::findOrFail($id));

        return response()->json($bomb, 200);
    }
}

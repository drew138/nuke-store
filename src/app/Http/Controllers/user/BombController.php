<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bomb;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BombController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['bombs'] = Bomb::all();

        return view('user.bombs.index')->with('data', $data);
    }

    public function show(string $id): View
    {
        $bomb = Bomb::with(['reviews' => function ($query) {
            // Getting all reviews that are verified and sorting with updated_at
            $query->where('is_verified', '=', true)->orderBy('updated_at', 'DESC');
        }, 'reviews.user'])->findOrFail($id);

        $bombRating = sprintf("%.2f", $bomb->getReviews()->avg('rating'));

        $data = [];
        $data['bomb'] = $bomb;

        $data['bombRating'] = $bombRating;

        return view('user.bombs.show')->with('data', $data);
    }

    public function search(Request $request): View
    {
        $query = $request['query'];

        $data = [];
        $data['bombs'] = Bomb::searchByName($query);

        return view('user.bombs.index')->with('data', $data);
    }
}

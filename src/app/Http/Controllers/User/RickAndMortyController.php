<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class RickAndMortyController extends Controller
{
    public function index(Request $request): View
    {
        $page = $request->query('page') ?? '1';

        $url = 'https://rickandmortyapi.com/api/character?page='.$page;
        $json = Http::get($url);

        $prev = substr($json['info']['prev'], 47) ?? null;
        $next = substr($json['info']['next'], 47) ?? null;

        $data = [];
        $data['characters'] = $json['results'];
        $data['prev'] = $prev;
        $data['next'] = $next;

        return view('user.rickandmorty.index')->with('data', $data);
    }
}

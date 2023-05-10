<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class RickAndMortyController extends Controller
{
    //
    public function index(): View
    {
        $url = 'https://rickandmortyapi.com/api/character';
        $results = Http::get($url)['results'];
        $data = ['characters' => $results];
        return view('user.rickAndMorty.index')->with('data', $data);
    }
}

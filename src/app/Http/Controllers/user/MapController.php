<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class MapController extends Controller
{
    public function index(): View
    {
        $data = User::getTotalMegatonsByCountry();

        return view('user.map.index')->with('data', $data);
    }
}

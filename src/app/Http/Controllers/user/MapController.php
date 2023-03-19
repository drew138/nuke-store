<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;

class MapController extends Controller
{
    public function index(): View
    {
        $data = User::getTotalMegatonsByCountry();
        return view('user.map.index')->with('data', $data);
    }
}

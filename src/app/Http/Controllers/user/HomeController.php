<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Returns a view to the home of the app
     */
    public function index(): View
    {
        return view('user.home.index');
    }
}
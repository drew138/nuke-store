<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Returns a view to the home of the app
     */
    public function index(): View
    {
        return view('admin.home.index');
    }
}


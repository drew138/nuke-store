<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminHomeController extends Controller
{
    /**
     * Returns a view to the home of the app
     */
    public function index(): View
    {
        return view('admin.home.index');
    }
}


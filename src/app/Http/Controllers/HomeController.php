<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function locale(string $locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
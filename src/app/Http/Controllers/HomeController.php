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
        return view('home.index');
    }

    /**
     * Used to set a language into the app. For example
     * go to /language/ru and it chages to russian.
     *
     * There are just two languages available: English (en) and
     * Russian (ru).
     */
    public function locale(string $locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}

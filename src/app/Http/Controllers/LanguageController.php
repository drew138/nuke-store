<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Used to set a language into the app. For example
     * go to /language/ru and it chages to russian.
     *
     * There are just two languages available: English (en) and
     * Russian (ru).
     */
    public function locale(Request $request)
    {
        app()->setLocale($request['locale']);
        session()->put('locale', $request['locale']);
        return redirect()->back();
    }
}

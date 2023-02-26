<?php

namespace App\Http\Controllers;

use App\Models\Bomb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BombController extends Controller
{
    /**
     * Main page of the bombs list.
     */
    public function index(): View
    {
        $data = [];
        $data['title'] = 'Bombs - Nukestore';
        $data['subtitle'] = 'List of bombs';
        $data['bombs'] = Bomb::all();

        return view('bomb.index')->with('data', $data);
    }

    /**
     * Shows an individual page for every bomb.
     */
    public function show(string $id): View|RedirectResponse
    {
        // Checks if $id is an intenger
        if (filter_var($id, FILTER_VALIDATE_INT) == true) {
            // Checks if $id is on bounds

            $bomb = Product::findOrFail($id);
            $data = [];
            $data['title'] = $bomb['name'].' - Nukestore';
            $data['subtitle'] = $bomb['name'].' - Bomb information';
            $data['product'] = $bomb;

            return view('bomb.show')->with('data', $data);
        }

        return redirect()->route('home.index');
    }

    /**
     * Returns a page to create a bomb.
     */
    public function create(): View
    {
        $data = [];
        $data['title'] = 'Create bomb';

        return view('bomb.create')->with('data', $data);
    }

    /**
     * Insert a new bomb into the database
     */
    public function save(Request $request): View|RedirectResponse
    {
        $request->validate([
            'name' => 'string',   // Must be a string
            'type' => 'string',   // Must be a string
            'price' => 'gt:0',     // Greater than 0
            'location_country' => 'string',   // Must be a string
            'manufacturing_country' => 'string',   // Must be a string
            'stock' => 'gte:0',    // Greater or equal than 0
            'images' => 'array',    // Must be an array
            'destruction_power' => 'gte:0',    // Greater or equal than 0
        ]);

        // Insert into database

        return back();
    }
}

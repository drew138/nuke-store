<?php

namespace App\Http\Controllers;

use App\Models\Bomb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BombController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['title'] = 'Bombs - '.__('app.app_name');
        $data['subtitle'] = __('home.home_header_bomb');
        $data['bombs'] = Bomb::all();

        return view('bombs.index')->with('data', $data);
    }

    public function show(string $id): View|RedirectResponse
    {
        if (filter_var($id, FILTER_VALIDATE_INT) == true) {

            $bomb = Bomb::findOrFail($id);
            $data = [];
            $data['title'] = $bomb->getName().' - '.__('app.app_name');
            $data['subtitle'] = $bomb->getName();
            $data['bomb'] = $bomb;

            return view('bombs.show')->with('data', $data);
        }

        return redirect()->route('home.index');
    }

    public function create(): View
    {
        $data = [];
        $data['title'] = 'Create bomb';

        return view('bombs.create')->with('data', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Bomb::validate($request);

        Bomb::create($request->only([
            'name',
            'type',
            'price',
            'location_country',
            'manufacturing_country',
            'stock',
            'image',
            'destruction_power',
        ]));

        return back()->withSuccess(__('bomb-create.successfully'));
    }

    public function destroy(Request $request): View|RedirectResponse
    {
        Bomb::destroy($request->only(['id']));

        return redirect()->route('bomb.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Validates\BombValidate;
use App\Interfaces\ImageStorage;
use App\Models\Bomb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminBombController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['bombs'] = Bomb::paginate(12);

        return view('admin.bombs.index')->with('data', $data);
    }

    public function search(Request $request): View
    {
        $query = $request['query'];

        $data = [];
        $data['bombs'] = Bomb::searchByName($query);

        return view('admin.bombs.index')->with('data', $data);
    }

    public function show(string $id): View
    {
        $bomb = Bomb::findOrFail($id);

        $data = [];
        $data['bomb'] = $bomb;

        return view('admin.bombs.show')->with('data', $data);
    }

    public function create(): View
    {
        return view('admin.bombs.create');
    }

    public function save(Request $request): RedirectResponse
    {
        BombValidate::validate($request);

        // Storing the bomb image and getting its path
        $imageUrl = '';
        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $imageUrl = $storeInterface->store($request->file('image'));
        }

        Bomb::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'price' => $request['price'],
            'location_country' => $request['location_country'],
            'manufacturing_country' => $request['manufacturing_country'],
            'stock' => $request['stock'],
            'destruction_power' => $request['destruction_power'],
            'image' => $imageUrl,
        ]);

        return back()->withSuccess(__('bomb.created_successfully'));
    }

    public function update(Request $request): View
    {
        $id = $request['id'];
        $bomb = Bomb::findOrFail($id);

        $data = [];
        $data['bomb'] = $bomb;

        return view('admin.bombs.update')->with('data', $data);
    }

    public function saveUpdate(Request $request): RedirectResponse
    {
        BombValidate::validate($request);
        Bomb::where('id', $request['id'])->update($request->only([
            'name',
            'type',
            'price',
            'location_country',
            'manufacturing_country',
            'stock',
            'destruction_power'])
        );

        return back()->withSuccess(__('bomb.updated_successfully'));
    }

    public function destroy(string $id): RedirectResponse
    {
        Bomb::destroy($id);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Bomb;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BombController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['bombs'] = Bomb::all();

        return view('user.bombs.index')->with('data', $data);
    }

    public function show(string $id): View
    {
        $bomb = Bomb::findOrFail($id);
        $bomb_rating = Review::where('bomb_id', '=', $id)->avg('rating');

        $data = [];
        $data['bomb'] = $bomb;
        $data['bomb_rating'] = $bomb_rating;

        return view('user.bombs.show')->with('data', $data);
    }

    public function create(): View
    {
        return view('user.bombs.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Bomb::validate($request);

        // Storing the bomb image and getting its path
        $storeInterface = app(ImageStorage::class);
        $image_url = $storeInterface->store($request);

        Bomb::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'price' => $request['price'],
            'location_country' => $request['location_country'],
            'manufacturing_country' => $request['manufacturing_country'],
            'stock' => $request['stock'],
            'destruction_power' => $request['destruction_power'],
            'image' => $image_url,
        ]);

        return back()->withSuccess(__('bomb.successfully'));
    }

    public function destroy(Request $request): View|RedirectResponse
    {
        Bomb::destroy($request->only(['id']));

        return redirect()->route('bomb.index');
    }

    public function search(Request $request): View
    {
        $query = $request['query'];
        
        $data = [];
        $data['bombs'] = Bomb::searchByName($query);
        return view('user.bombs.index')->with('data', $data);
    }
}

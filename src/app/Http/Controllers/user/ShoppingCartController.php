<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Bomb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    public function index(): View
    {
        $cart_data = session()->get('shopping_cart');
        $bombs = Bomb::findMany($cart_data);

        $data = [];
        $data['bombs'] = $bombs;

        return view('user.shopping_cart.index')->with('data', $data);
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request['id'];

        $cart_data = $request->session()->get('shopping_cart');
        unset($cart_data[$id]);
        $request->session()->put('shopping_cart', $cart_data);

        return redirect()->back();
    }

    public function add(Request $request): RedirectResponse
    {
        $id = $request['id'];

        $cart_data = $request->session()->get('shopping_cart');
        $cart_data[$id] = $id;
        $request->session()->put('shopping_cart', $cart_data);

        return redirect()->back();
    }
}

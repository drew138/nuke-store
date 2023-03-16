<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Bomb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShoppingCartController extends Controller
{
    const SHOPPING_CART = 'shopping_cart';
    public function index(): View
    {


        return view('user.shopping_cart.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        return redirect()->back();
    }

    public function add(Request $request): RedirectResponse
    {
        $id       = $request['id'];
        $quantity = $request['quantity'];

        $cart_data = $request->session()->get(self::SHOPPING_CART);
        $cart_data[$id] = $quantity;
        dd($cart_data);
        $request->session()->put(self::SHOPPING_CART, $cart_data);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['users'] = User::all();

        return view('user.users.index')->with('data', $data);
    }

    public function profile(string $id): View
    {
        $user = User::with('bombUsers.bomb')->findOrFail($id);

        $data = [];
        $data['user'] = $user;

        return view('user.users.profile')->with('data', $data);
    }

    public function compare(string $id): View
    {
        $userSession = User::with('bombUsers.bomb')->findOrFail(Auth::id());
        $user = User::with('bombUsers.bomb')->findOrFail($id);

        $data = [];
        $data['user'] = $user;
        $data['userSession'] = $userSession;

        return view('user.users.compare')->with('data', $data);
    }
}

<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function profile(string $id): View
    {
        $user = User::findOrFail($id);

        $data = [];
        $data['user'] = $user;

        return view('user.users.profile')->with('data', $data);
    }
}

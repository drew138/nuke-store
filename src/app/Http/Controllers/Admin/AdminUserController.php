<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['users'] = User::all();

        return view('admin.users.index')->with('data', $data);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function update(Request $request): View
    {
        $id = $request['id'];
        $user = User::findOrFail($id);

        $data = [];
        $data['user'] = $user;

        return view('admin.users.update')->with('data', $data);
    }

    public function saveUpdate(Request $request): RedirectResponse
    {
        User::validate($request);
        User::where('id', $request['id'])->update(
            $request->only([
                'name',
                'role',
                'country',
                'balance',
            ])
        );

        return back()->withSuccess(__('users.updated_successfully'));
    }

    public function save(Request $request): RedirectResponse
    {
        User::validate($request);
        User::validateAndPassword($request);
        User::create([
            'name' => $request['name'],
            'role' => $request['role'],
            'balance' => $request['balance'],
            'country' => $request['country'],
            'password' => Hash::make($request['password']),
            'email' => $request['email'],
        ]);

        return back()->withSuccess(__('users.created_successfully'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        User::destroy($request['id']);

        return redirect()->back();
    }
}

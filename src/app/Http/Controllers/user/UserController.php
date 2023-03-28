<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function update(): View
    {
        $data = [];
        $data['user'] = Auth::user();

        return view('user.users.update')->with('data', $data);
    }

    public function saveUpdate(Request $request): RedirectResponse
    {
        User::validate($request);

        // Storing the user image and getting its path
        $imageUrl = Auth::user()->getProfilePicture();
        if ($request->hasFile('profile_picture')) {
            $storeInterface = app(ImageStorage::class);
            $imageUrl = $storeInterface->store($request->file('profile_picture'));
        }

        User::where('id', Auth::id())->update([
            'name' => $request['name'],
            'country' => $request['country'],
            'profile_picture' => $imageUrl,
        ]);

        return back()->withSuccess(__('users.updated_successfully'));
    }
}

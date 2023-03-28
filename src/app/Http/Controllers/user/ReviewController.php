<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);

        // Storing the review image and getting its path
        $imageUrl = '';
        if ($request->hasFile('image')) {
            $storeInterface = app(ImageStorage::class);
            $imageUrl = $storeInterface->store($request->file('image'));
        }

        Review::create([
            'title' => $request['title'],
            'rating' => $request['rating'],
            'description' => $request['description'],
            'is_verified' => false,
            'image' => $imageUrl,
            'bomb_id' => $request['bomb_id'],
            'user_id' => Auth::id(),
        ]);

        return back()->withSuccess(__('reviews.created_succesfully'));
    }
}

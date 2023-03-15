<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['reviews'] = Review::all();

        return view('user.reviews.index')->with('data', $data);
    }

    public function create(): View
    {
        $data = [];

        return view('user.reviews.create')->with('data', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validateRequest($request);
        $creationData = $request->only(['title', 'rating', 'image', 'description', 'is_verified']);
        Review::create($creationData);
        return back()->withSuccess(__('reviews.created_succesfully'));
    }

    public function show(string $id): View
    {
        $data = [];
        $review = Review::findorFail($id);
        $data['review'] = $review;

        return view('user.reviews.show')->with('data', $data);
    }


    public function destroy(string $id): RedirectResponse
    {
        Review::destroy($id);

        return redirect()->route('reviews.index');
    }
}

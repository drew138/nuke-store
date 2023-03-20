<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminReviewController extends Controller
{
    public function index(): View
    {
        $data = [];
        $data['reviews'] = Review::with('user')->with('bomb')->orderBy('updated_at', 'DESC')->get();

        return view('admin.reviews.index')->with('data', $data);
    }

    public function create(): View
    {
        $data = [];

        return view('admin.reviews.create')->with('data', $data);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);
        $creationData = $request->only(['title', 'rating', 'image', 'description', 'is_verified']);
        Review::create($creationData);

        return back()->withSuccess(__('reviews.created_succesfully'));
    }

    public function show(string $id): View
    {
        $data = [];
        $review = Review::findorFail($id);
        $data['review'] = $review;

        return view('admin.reviews.show')->with('data', $data);
    }

    public function destroy(string $id): RedirectResponse
    {
        Review::destroy($id);

        return back();
    }

    public function verify(Request $request): RedirectResponse
    {
        $review = Review::findOrFail($request['id']);
        $review->verify();

        return back();
    }

    public function unverify(Request $request): RedirectResponse
    {
        $review = Review::findOrFail($request['id']);
        $review->unverify();

        return back();
    }
}

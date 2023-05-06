<?php

namespace App\Http\Controllers\Admin;

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
        $data['reviews'] = Review::with('user')->with('bomb')->orderBy('updated_at', 'DESC')->paginate(25);

        return view('admin.reviews.index')->with('data', $data);
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

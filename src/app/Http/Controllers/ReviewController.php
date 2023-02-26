<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['reviews'] = Review::all();
        return view('review.index')->with('viewData', $viewData);
    }

    public function show(int $id): View|RedirectResponse
    {
        $viewData = [];
        // Search how to redirect if fail with out try except
        $review = Review::findorFail($id);
        $viewData['review'] = $review;
        return view('review.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('review.create');
    }

    public function save(Request $request): Response|RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required|gte:1|lte:5',
            'image' => 'required',
            'description' => 'required',
            'is_verified' => 'required'
        ]);
        $creationData = $request->only(['title', 'rating', 'image', 'description', 'is_verified']);
        Review::create($creationData);
        return back();
    }
}
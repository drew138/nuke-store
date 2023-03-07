<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = [];
        $data['reviews'] = Review::all();

        return view('reviews.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $data = [];

        return view('reviews.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'rating' => 'required|gte:1|lte:5',
            'image' => 'required',
            'description' => 'required',
            'is_verified' => 'required',
        ]);
        $creationData = $request->only(['title', 'rating', 'image', 'description', 'is_verified']);
        Review::create($creationData);

        return back()->withSuccess(__('reviews.created_succesfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $data = [];
        // Search how to redirect if fail with out try except
        $review = Review::findorFail($id);
        $data['review'] = $review;

        return view('reviews.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Review::destroy($id);

        return redirect()->route('reviews.index');
    }
}

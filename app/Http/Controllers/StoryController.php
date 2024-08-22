<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stories.index', [
            'stories' => Story::published()->orderBy('published_at', 'desc')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        return view('stories.show', [
            'story' => $story,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Story;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        seo()
            ->title("All Stories")
            ->description("Stay tuned for the latest updates and a mix of uplifting, heartwarming, and thought-provoking stories from the real people.");

        return view('stories.index', [
            'stories' => Story::published()->orderBy('published_at', 'desc')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        seo()
            ->title($story->headline)
            ->description($story->meta_description);

        return view('stories.show', [
            'story' => $story,
        ]);
    }
}

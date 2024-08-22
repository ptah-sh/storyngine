@extends('layouts.app', [
    'vendor' => null,
    'mood' => null,
])

@section('content')
    @foreach($stories as $story)
        <div class="mb-4">
            <h2 class="text-lg font-semibold mb-2"><a href="{{ route('stories.show', $story) }}" class="{{ 
                $story->mood == 'positive' ? 'text-green-500 hover:text-green-700' : 
                ($story->mood == 'negative' ? 'text-red-500 hover:text-red-700' : 
                'text-gray-500 hover:text-gray-700') 
            }}">{{ $story->headline }}</a></h2>
            <div class="flex items-center">
                <span class="inline-block {{ $story->mood == 'positive' ? 'bg-green-700 text-white' : ($story->mood == 'negative' ? 'bg-red-500 text-white' : 'bg-gray-300 text-gray-700') }} rounded-full px-3 py-1 text-sm font-semibold mr-2">{{ $story->vendor->name }} {{ $story->mood == 'positive' ? '😊' : ($story->mood == 'negative' ? '😠' : '😐') }}</span>
                <p class="text-sm text-gray-500 ml-2">{{ $story->published_at->shortRelativeToNowDiffForHumans() }}</p>
            </div>
        </div>
    @endforeach
@endsection

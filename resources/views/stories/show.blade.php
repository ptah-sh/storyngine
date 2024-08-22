@extends('layouts.app', [
    'vendor' => $story->vendor->name,
    'mood' => $story->mood,
])

@section('content')
    <div class="mb-4">
        <h2 class="text-2xl font-semibold mb-2">{{ $story->headline }}</h2>
        <div class="flex items-center">
            <span class="inline-block {{ $story->mood == 'positive' ? 'bg-green-700 text-white' : ($story->mood == 'negative' ? 'bg-red-500 text-white' : 'bg-gray-300 text-gray-700') }} rounded-full px-3 py-1 text-sm font-semibold mr-2">{{ $story->vendor->name }} {{ $story->mood == 'positive' ? '😊' : ($story->mood == 'negative' ? '😠' : '😐') }}</span>
            <p class="text-sm text-gray-500 ml-2">{{ $story->published_at->shortRelativeToNowDiffForHumans() }}</p>
        </div>
        <p class="text-lg text-gray-700 mt-2">{!! $story->summary !!}</p>
        <a href="{{ $story->source }}" class="text-blue-500 hover:text-blue-700 mt-4 flex items-center" rel="norel nofollow noopener">
            @if(Str::startsWith($story->source, 'https://x.com'))
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 pr-1" viewBox="0 0 48 48">
                    <linearGradient id="U8Yg0Q5gzpRbQDBSnSCfPa_yoQabS8l0qpr_gr1" x1="4.338" x2="38.984" y1="-10.056" y2="49.954" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4b4b4b"></stop><stop offset=".247" stop-color="#3e3e3e"></stop><stop offset=".686" stop-color="#2b2b2b"></stop><stop offset="1" stop-color="#252525"></stop></linearGradient><path fill="url(#U8Yg0Q5gzpRbQDBSnSCfPa_yoQabS8l0qpr_gr1)" d="M38,42H10c-2.209,0-4-1.791-4-4V10c0-2.209,1.791-4,4-4h28c2.209,0,4,1.791,4,4v28	C42,40.209,40.209,42,38,42z"></path><path fill="#fff" d="M34.257,34h-6.437L13.829,14h6.437L34.257,34z M28.587,32.304h2.563L19.499,15.696h-2.563 L28.587,32.304z"></path><polygon fill="#fff" points="15.866,34 23.069,25.656 22.127,24.407 13.823,34"></polygon><polygon fill="#fff" points="24.45,21.721 25.355,23.01 33.136,14 31.136,14"></polygon>
                </svg>

                Follow the original story at X (formerly Twitter)
            @elseif(Str::startsWith($story->source, 'https://www.reddit.com'))
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 pr-1" viewBox="-25.65 -42.75 222.3 256.5"><g transform="translate(-85.4 -85.4)"><circle r="85.5" cy="170.9" cx="170.9" fill="#ff4500"/><path d="M227.9 170.9c0-6.9-5.6-12.5-12.5-12.5-3.4 0-6.4 1.3-8.6 3.5-8.5-6.1-20.3-10.1-33.3-10.6l5.7-26.7 18.5 3.9c.2 4.7 4.1 8.5 8.9 8.5 4.9 0 8.9-4 8.9-8.9s-4-8.9-8.9-8.9c-3.5 0-6.5 2-7.9 5l-20.7-4.4c-.6-.1-1.2 0-1.7.3s-.8.8-1 1.4l-6.3 29.8c-13.3.4-25.2 4.3-33.8 10.6-2.2-2.1-5.3-3.5-8.6-3.5-6.9 0-12.5 5.6-12.5 12.5 0 5.1 3 9.4 7.4 11.4-.2 1.2-.3 2.5-.3 3.8 0 19.2 22.3 34.7 49.9 34.7 27.6 0 49.9-15.5 49.9-34.7 0-1.3-.1-2.5-.3-3.7 4.1-2 7.2-6.4 7.2-11.5zm-85.5 8.9c0-4.9 4-8.9 8.9-8.9s8.9 4 8.9 8.9-4 8.9-8.9 8.9-8.9-4-8.9-8.9zm49.7 23.5c-6.1 6.1-17.7 6.5-21.1 6.5-3.4 0-15.1-.5-21.1-6.5-.9-.9-.9-2.4 0-3.3.9-.9 2.4-.9 3.3 0 3.8 3.8 12 5.2 17.9 5.2 5.9 0 14-.9 17.9-5.2.9-.9 2.4-.9 3.3 0 .7 1 .7 2.4-.2 3.3zm-1.6-14.6c-4.9 0-8.9-4-8.9-8.9s4-8.9 8.9-8.9 8.9 4 8.9 8.9-4 8.9-8.9 8.9z" fill="#fff"/></g></svg>

                Follow the original story at Reddit
            @elseif(Str::startsWith($story->source, 'https://news.ycombinator.com'))
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 pr-1" viewBox="0 0 48 48">
                    <path fill="#FF6D00" d="M42,42H6V6h36V42z"></path><path fill="#FFF" d="M8,8v32h32V8H8z M38,38H10V10h28V38z"></path><path fill="#FFF" d="M23 32L25 32 25 26 30.5 16 28.4 16 24 24.1 19.6 16 17.5 16 23 26z"></path>
                </svg>

                Follow the original story at HackerNews
            @elseif(Str::startsWith($story->source, 'https://medium.com'))
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 pr-1" viewBox="0 0 72 72">
                    <path d="M45.049,14C57.06,14,58,14.94,58,26.951v18.098C58,57.06,57.06,58,45.049,58H26.951C14.94,58,14,57.06,14,45.049V26.951	C14,14.94,14.94,14,26.951,14H45.049z M29.713,44.151c4.502,0,8.151-3.649,8.151-8.151c0-4.502-3.649-8.151-8.151-8.151	c-4.502,0-8.151,3.649-8.151,8.151C21.562,40.502,25.212,44.151,29.713,44.151z M42.713,43.757c2.228,0,4.034-3.473,4.034-7.757	c0-4.284-1.806-7.757-4.034-7.757c-2.228,0-4.034,3.473-4.034,7.757C38.679,40.284,40.485,43.757,42.713,43.757z M48.98,42.928	c0.775,0,1.403-3.102,1.403-6.928s-0.628-6.928-1.403-6.928c-0.775,0-1.403,3.102-1.403,6.928S48.205,42.928,48.98,42.928z"></path>
                </svg>
                
                Follow the original story at Medium
            @else
                Follow the original story at {{ parse_url($story->source, PHP_URL_HOST) }}
            @endif
        </a>
    </div>
@endsection

@props(['vendor', 'mood'])

<!doctype html>
<html>
<head>

    @if(config('app.gtmId'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('app.gtmId') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ config('app.gtmId') }}');
        </script>
    @endif

    <link rel="icon" href="/favicon.avif" type="image/avif">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    @metadata
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex justify-center bg-gradient-to-r from-lightblue-200 to-lightgray-300">
    <div class="flex flex-col max-w-[800px] justify-center bg-gradient-to-r from-lightblue-200 to-lightgray-300">
        <div class="text-center m-4">
            <a href="{{ route('stories.index') }}" class="text-2xl font-bold text-gray-700 hover:text-gray-900">
                Vendor Stories
            </a>
        </div>

    
        <div class="min-w-[600px] p-4 md:p-4 lg:p-4 bg-white bg-opacity-50 rounded-lg shadow-lg">
            <div>
                <h1 class="text-3xl font-bold mb-4 text-gray-600">{{ Str::ucfirst($mood) }} {{ $vendor }} Stories</h1>
                <p class="text-lg text-gray-700 text-balance">Follow us for the latest updates and sometimes happy, sometimes sad, sometimes neutral stories from the real people interating with big corporations.</p>
            </div>
        </div>
        <div class="content p-4 md:p-6 lg:p-8 ">
            @yield('content')
        </div>

        <div class="footer p-4 md:p-6 lg:p-8 text-center text-gray-400">
            <p>Hosted with ❤️ on <a href="https://ptah.sh" class="text-blue-500 hover:text-blue-700">ptah.sh</a></p>
        </div>
    </div>
</body>
</html>

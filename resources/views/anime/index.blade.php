@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Top Anime</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($animes as $anime)
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="{{ $anime['images']['jpg']['image_url'] }}" alt="{{ $anime['title'] }}" class="w-full h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $anime['title'] }}</h2>
                    <p class="text-gray-600">Score: {{ $anime['score'] }}</p>
                    <a href="{{ route('anime.show', $anime['mal_id']) }}" class="mt-2 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Details</a>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-8">
        @if ($pagination['current_page'] > 1)
            <a href="{{ route('home', ['page' => $pagination['current_page'] - 1]) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Previous</a>
        @endif

        @if ($pagination['has_next_page'])
            <a href="{{ route('home', ['page' => $pagination['current_page'] + 1]) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Next</a>
        @endif
    </div>
</div>
@endsection